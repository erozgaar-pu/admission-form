<?php

require '/home/khatqzcj/vendor/autoload.php'; // Include PHPMailer via Composer or manually

session_start(); // Start the session

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('/home/khatqzcj/public_html/admission-form/db_connect.php');

$_SESSION['form_submitted'] = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mode = $_POST['mode'];
    $course = $_POST['course'];
    $program = $_POST['program'];
    $batchNumber = $_POST['batchNumber'];
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $gender = $_POST['gender'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $picture_path = 'uploads/' . basename($_FILES['picture']['name']);
    $challan_path = 'uploads/' . basename($_FILES['challan']['name']);

    move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path);
    move_uploaded_file($_FILES['challan']['tmp_name'], $challan_path);

    $sql = "INSERT INTO formEntries (mode, course, program, batchNumber, name, father_name, gender, cnic, email, phone, qualification, address, city, picture_path, challan_path)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssss", $mode, $course, $program, $batchNumber, $name, $father_name, $gender, $cnic, $email, $phone, $qualification, $address, $city, $picture_path, $challan_path);

if ($stmt->execute()) {
        // Send email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Use the correct SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'erozgaar.ier@pu.edu.pk'; // Your email
            $mail->Password = 'rila yjab lcuh bydf'; // Your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient settings
            $mail->setFrom('erozgaar.ier@pu.edu.pk', 'Erozgaar Center PU');
            $mail->addAddress($email, $name);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Form Submission Successful';
            $mail->Body = "
                <h2>Dear $name,</h2>
                <p>Thank you for submitting your form. Your credentials are as below: <strong> </strong>.</p>
                <p>Mode of Study: <strong>$mode</strong>.</p>
                <p>Course: <strong>$course</strong>.</p>
                <p>Program: <strong>$program</strong>.</p>
                <p>CNIC: <strong>$cnic</strong>.</p>
                <p><strong>You have provided the following payment proof:</strong><br>
                <a href='https://www.khateebkhan.com/admission-form/$challan_path' target='_blank'> <img border='0' alt='Click to see your challan if not visible.' src='https://www.khateebkhan.com/admission-form/$challan_path' width='300' style='height:auto;'></a>
                </p>
                <br>
                <p>You will be informed about the start of classes via email.</p>
                <br>
                
                
                
                <br>
                <p>Regards,<br>Erozgaar Center<br>Institute of Education and Research<br>University of the Punjab, Lahore.</p>
            ";

            // Send the email
            $mail->send();
            echo "Form submitted successfully. A confirmation email has been sent.";
        } catch (Exception $e) {
            echo "Form submitted, but the email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Redirect to display.php
        header("Location: display.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>