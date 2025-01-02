<?php
// Set the response type to JSON
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the 'name' from the request
    $name = htmlspecialchars($_POST['name']);
    
    // Respond with a JSON object
    echo json_encode(['message' => "Hello, $name!"]);
} else {
    // Return an error for unsupported request methods
    http_response_code(405); // 405 = Method Not Allowed
    echo json_encode(['error' => 'Only POST requests are allowed.']);
}
?>
