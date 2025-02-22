<?php
require '/home/khatqzcj/vendor/autoload.php';

use Google\Client;
use Google\Service\Sheets;

// Database connection
function syncDataToSheet($sql, $spreadsheetId, $range) {
    // Database connection
    include('/home/khatqzcj/public_html/admission-form/db_connect.php');


    // Query data
    $result = $conn->query($sql);
    if (!$result) {
        die("Error retrieving data: " . $conn->error);
    }

    // Format data for Google Sheets
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = array_values($row);
    }

    // Google Sheets API setup
    $client = new Google\Client();
    $client->setApplicationName('Sync Database to Google Sheets');
    $client->setScopes([Google\Service\Sheets::SPREADSHEETS]);
    $client->setAuthConfig(__DIR__ . '/erozgaar-data-f946503f3239.json');
    $service = new Google\Service\Sheets($client);

    // Prepare and write data to Google Sheets
    $body = new Google\Service\Sheets\ValueRange(['values' => $data]);
    $params = ['valueInputOption' => 'RAW'];
    $service->spreadsheets_values->update($spreadsheetId, $range, $body, $params);

    echo "Data synced successfully! <br>";
    echo "Cron job ran at:" . date('Y-m-d H:i:s')."<br>";
}

// Call the function for formEntries table
syncDataToSheet("SELECT * FROM formEntries", '1YqZ64mCcPZ43uliXFHSXmDALVdiO2MgMKxTSYKOB3BU', 'Sheet1!A2');

// Call the function for challanEntries table
syncDataToSheet("SELECT * FROM challanEntries", '1YqZ64mCcPZ43uliXFHSXmDALVdiO2MgMKxTSYKOB3BU', 'Sheet2!A2');

echo "<pre>";
print_r($data);
echo "</pre>";

?>