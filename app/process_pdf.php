<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['fileData']) || !isset($input['fileName'])) {
    echo json_encode(['success' => false, 'error' => 'Missing file data']);
    exit;
}

try {
    // Decode base64
    $fileData = base64_decode($input['fileData']);
    $fileName = basename($input['fileName']);
    
    // Save temporarily
    $tempPath = sys_get_temp_dir() . '/' . uniqid() . '.pdf';
    file_put_contents($tempPath, $fileData);
    
    // Extract text from PDF (simple method)
    $pdfText = extractPDFText($tempPath);
    
    if (empty($pdfText)) {
        throw new Exception('Could not extract text from PDF. Please ensure the PDF contains readable text.');
    }
    
    // Limit text to reasonable size for API
    $pdfText = substr($pdfText, 0, 4000);
    
    // Send to Gemini API for review
    $review = generatePDFReview($pdfText, $fileName);
    
    // Clean up
    unlink($tempPath);
    
    echo json_encode(['success' => true, 'review' => $review]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

// Extract text from PDF using pdftotext or similar
function extractPDFText($filePath) {
    $text = '';
    
    // Try using pdftotext command (Linux/Windows)
    if (function_exists('shell_exec')) {
        // Check if pdftotext is available
        $output = @shell_exec('pdftotext "' . escapeshellarg($filePath) . '" - 2>&1');
        if ($output && strpos($output, 'Error') === false) {
            return $output;
        }
    }
    
    // Fallback: Try Python pdfplumber if available
    $pythonScript = <<<'PYTHON'
import sys
try:
    import PyPDF2
    pdf = PyPDF2.PdfReader(sys.argv[1])
    text = ""
    for page in pdf.pages:
        text += page.extract_text()
    print(text)
except Exception as e:
    print("Error: " + str(e))
PYTHON;
    
    $tempPy = sys_get_temp_dir() . '/extract_pdf.py';
    file_put_contents($tempPy, $pythonScript);
    $output = @shell_exec('python "' . $tempPy . '" "' . escapeshellarg($filePath) . '" 2>&1');
    @unlink($tempPy);
    
    if ($output && strpos($output, 'Error') === false) {
        return $output;
    }
    
    // Final fallback: Try simple regex extraction
    $rawData = file_get_contents($filePath);
    preg_match_all('/BT\s+(.*?)\s+ET/s', $rawData, $matches);
    if (!empty($matches[1])) {
        $text = implode(' ', $matches[1]);
        $text = preg_replace('/[^\x20-\x7E\n\r]/i', '', $text);
        return $text;
    }
    
    return $text;
}

// Generate review using Gemini API
function generatePDFReview($pdfText, $fileName) {
    $apiKey = 'AIzaSyAuMI-P6H5ZttaEg1NociEIHMIs8yIZpOA';
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;
    
    $systemPrompt = "You are Rischa, an expert AI tutor. A user has uploaded a PDF document. Your task:

1. Analyze the PDF content provided
2. Create a comprehensive educational review including:
   - Key Concepts: Main ideas and topics covered
   - Real-World Applications: How these concepts are used in practice
   - Industry Usage: Which major companies use this technology/methodology
   - Deep Dive Explanation: Break down complex concepts with examples
   - Learning Takeaways: What students should focus on
   - Career Impact: How this knowledge helps in professional development

Format the response in clear sections with emojis, bullet points, and real examples.
Make it engaging, detailed, and practical for learning.";

    $postData = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $systemPrompt . "\n\nPDF Content from '" . $fileName . "':\n\n" . $pdfText . "\n\nPlease analyze this PDF and create a comprehensive educational review with real-world examples and company usage."]
                ]
            ]
        ]
    ];
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode !== 200) {
        throw new Exception('API Error: ' . $httpCode);
    }
    
    $responseData = json_decode($response, true);
    
    if (isset($responseData['error'])) {
        throw new Exception('API Error: ' . ($responseData['error']['message'] ?? 'Unknown error'));
    }
    
    if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
        $reviewText = $responseData['candidates'][0]['content']['parts'][0]['text'];
        // Format the response with HTML for better display
        $html = '<div style="color: #7c3aed; line-height: 1.8;">';
        $html .= str_replace("\n", '<br>', htmlspecialchars($reviewText));
        $html .= '</div>';
        return $html;
    }
    
    throw new Exception('No response from API');
}
?>
