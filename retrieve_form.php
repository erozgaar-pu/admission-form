<?php
session_start();

// Initialize variables
$formData = null;
$error = null;

// Database connection


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $cnic = isset($_POST['cnic']) ? $_POST['cnic'] : '';

    // Establish database connection
include('/home/khatqzcj/public_html/admission-form/db_connect.php');


    // Check which field is provided and query accordingly
    if ($id) {
        $sql = "SELECT * FROM formEntries WHERE id = '$id' LIMIT 1";
    } elseif ($cnic) {
        $sql = "SELECT * FROM formEntries WHERE cnic = '$cnic' LIMIT 1";
    } else {
        $error = "Please provide either an ID or CNIC.";
    }

    if (!$error) {
        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the result into the formData variable
            $formData = $result->fetch_assoc();

            // Store form data in session and redirect to display.php
            $_SESSION['form_data'] = $formData;
            header("Location: display_retrieve.php");
            exit();
        } else {
            $error = "No records found for the provided ID or CNIC.";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="https://www.khateebkhan.com/admission-form/images/E-Rozgaar_Logo.png">
    <script>
        // Function to format CNIC input
        function formatCNIC(input) {
            // Remove all non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Add hyphens in the correct places
            if (value.length >= 5 && value.length < 12) {
                value = value.slice(0, 5) + '-' + value.slice(5);
            } else if (value.length >= 12) {
                value = value.slice(0, 5) + '-' + value.slice(5, 12) + '-' + value.slice(12, 13);
            }

            // Set the formatted value back to the input field
            input.value = value;
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="m-2">
        <div class="card p-2 shadow">
            
        
        <h5 class="display-5 text-center">Enter ID or CNIC to Retrieve Admission Form</h5>
        
        <!-- Display any error messages -->
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Display the search form -->
        <?php if (!$formData): ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="id">Form ID:</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter Form ID (Optional)">
                </div>
                <div class="form-group">
                    <label for="cnic">CNIC:</label>
                    <input type="text" class="form-control" id="cnic" name="cnic" placeholder="Enter CNIC (Optional)" oninput="formatCNIC(this)">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        <?php endif; ?>
        </div>
        </div>
    </div>
</body>
</html>