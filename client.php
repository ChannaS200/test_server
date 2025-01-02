<!DOCTYPE html>
<html>
<head>
    <title>API Client</title>
</head>
<body>
    <h1>Test the Web Service</h1>
    <form action="" method="POST">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Send</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);

        // Prepare POST data
        $data = ['name' => $name];

        // Use cURL to send a request to the web service
        $ch = curl_init('http://localhost:8080/process.php'); // URL of your service
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // Get the response and close the cURL session
        $response = curl_exec($ch);
        curl_close($ch);

        // Decode and display the response
        $responseData = json_decode($response, true);
        if (isset($responseData['message'])) {
            echo '<p>' . htmlspecialchars($responseData['message']) . '</p>';
        } else {
            echo '<p>Error: ' . htmlspecialchars($responseData['error']) . '</p>';
        }
    }
    ?>
</body>
</html>
