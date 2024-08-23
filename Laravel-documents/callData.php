<?php
// Set the API URL
$api_url = 'http://127.0.0.1:8000/api/callData';

// Define the three different JSON payloads to be sent in the POST requests
$dataSets = array(
    array(
        'agent_id' => '27',
        'phone_no' => '077261590',
        'language' => 'sinhala',
        'center' => 'kurunegala',
        'call_status' => 'answered',
        'job_status' => 'approved',
        'customer_status' => 'happy',
        'comments' => 'AAA',
        'score' => '5'
    ),
    array(
        'agent_id' => '28',
        'phone_no' => '077261597',
        'language' => 'sinhala',
        'center' => 'colombo',
        'call_status' => 'not answered',
        'job_status' => 'not approved',
        'customer_status' => 'N/A',
        'comments' => 'N/A',
        'score' => '0'
    ),
    array(
        'agent_id' => '28',
        'phone_no' => '070451590',
        'language' => 'english',
        'center' => 'colombo',
        'call_status' => 'answered',
        'job_status' => 'approved',
        'customer_status' => 'happy',
        'comments' => 'AAA',
        'score' => '4'
    )
);

// Loop to send the requests 12 times, cycling through the data sets
for ($i = 0; $i < 12; $i++) {
    // Select the data set based on the current iteration
    $currentDataSet = $dataSets[$i % 3];
    
    // Convert the current payload to JSON format
    $payload = json_encode($currentDataSet);

    // Initialize the cURL session
    $cURLConnection = curl_init($api_url);

    // Set the cURL options for the POST request
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload)
    ));

    // Execute the cURL session and capture the response
    $apiResponse = curl_exec($cURLConnection);

    // Check for cURL errors
    if ($apiResponse === false) {
        // Print the cURL error
        echo 'Curl error: ' . curl_error($cURLConnection) . "\n";
    } else {
        // Print the API response
        echo 'Response: ' . $apiResponse . "\n";
    }

    // Close the cURL session
    curl_close($cURLConnection);

    // Sleep for 1 second before the next iteration
    sleep(1);
}
?>
