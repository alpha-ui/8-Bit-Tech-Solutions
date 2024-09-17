
<?php
// Replace with your actual Google Sheets API key (remove unnecessary spaces)
$apiKey = 'AIzaSyC07Kexn15fN0spCTt2yf2YlZukWz3t_Uw';

// Extract sheet ID from the URL (if using URL parameter)
$sheetId = explode('/', $_SERVER['REQUEST_URI'])[5];

// Construct the sheet URL (adjust based on your sheet location)
$sheetUrl = 'https://docs.google.com/spreadsheets/d/1wfxyOsRsSTvpWrtV5AEdQrPK3ymXU4Aw49AcdLFNUS0/edit?gid=2084010375#gid=2084010375' . $sheetId . '/values/A1:Z100';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Extract form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $subject = $_POST['subject'];

  // Get service (from URL parameter or hidden field)
  $service = isset($_GET['service']) ? $_GET['service'] : (isset($_POST['service']) ? $_POST['service'] : '');

  // Prepare data for Google Sheets API
  $data = [
    'majorDimension' => 'COLUMNS',
    'values' => [
      [$name, $email, $mobile, $service, $subject]
    ]
  ];

  // Make API request using Guzzle
  $client = new GuzzleHttp\Client();
  $response = $client->request('PUT', $sheetUrl, [
    'headers' => [
        // Make API request using Guzzle
        $client = new GuzzleHttp\Client();
        $response = $client->request('PUT', $sheetUrl, [
          'headers' => [
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json'
          ],
          'json' => $data
        ]);
      
        // Handle response
        if ($response->getStatusCode() === 200) {
          echo 'Data successfully sent to Google Sheets.';
        } else {
          echo 'Error sending data to Google Sheets: ' . $response->getBody();
        }
      }
