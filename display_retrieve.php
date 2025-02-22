<?php

session_start();
if (!isset($_SESSION['form_data'])) {
    // Redirect the user to the form or an error page if they haven't submitted the form
    
    header("Location: retrieve_form.php"); // Redirect to form.php or an error page
    exit();
}

include('/home/khatqzcj/public_html/admission-form/db_connect.php');


$sql = "SELECT * FROM formEntries ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);
$formData = $_SESSION['form_data'];
$conn->close();

unset($_SESSION['form_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Form</title>
    <link rel="icon" type="image/x-icon" href="https://www.khateebkhan.com/wp-content/uploads/2024/11/cropped-favicon_new-300x300-1.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@400;700&family=Gochi+Hand&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tangerine:wght@400;700&family=Unica+One&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
    </script>
    <script type="text/javascript">
        function convertHTMLtoPDF() {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');
            const dpi = 150;
            const divElement = document.querySelector("#page1-div");
    
            html2canvas(divElement, {
                scale: 1.5,
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                pdf.addImage(imgData, 'PNG', 5, 5, 200, 287);
                pdf.save('admission_form.pdf');
            });
        }
    </script>
    <style>
        @page {
        size: A4;
        margin: 0;
    }
    .content {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
    </style>
    <script>
        function printPage() {
            window.print(); 
            
        }
    </script>
    <style type="text/css">
    
<!--
	p {margin: 0; padding: 0;}	
	.ft10{font-size:28px;font-family:"Gochi Hand", cursive;color:#0085cc;}
	.ft11{font-size:13px;font-family:"Aref Ruqaa Ink", serif;color:#2b2a29;}
	.ft11-1{font-size:20px;font-family:"Unica One", sans-serif;color:#2b2a29;}
	.ft12{font-size:13px;font-family:"Aref Ruqaa Ink", serif;color:#42637a;}
	.ft12-1{font-size:19px;font-family:"Aref Ruqaa Ink", serif;color:#029ba7;}
	.ft12-2{font-size:19px;font-family:"Aref Ruqaa Ink", serif;color:#e5097f;}
	.ft12-3{font-size:19px;font-family:"Aref Ruqaa Ink", serif;color:#74b734;}
	.ft12-4{font-size:19px;font-family:"Aref Ruqaa Ink", serif;color:#e51a4b;}
	.ft13{font-size:19px;font-family:"Gochi Hand", cursive;color:#029ba7;}
	.ft14{font-size:19px;font-family:"Gochi Hand", cursive;color:#74b734;}
	.ft15{font-size:57px;font-family: "Tangerine", cursive;color:#00aa00;}
	.ft16{font-size:15px;font-family: "Tangerine", cursive;color:#ffffff;}
	.ft17{font-size:19px;font-family:"Aref Ruqaa Ink", serif;color:#e51a4b;}
	.ft18{font-size:14px;font-family:"Gochi Hand", cursive;color:#42637a;}
	.ft19{font-size:15px;font-family:"Gochi Hand", cursive;color:#e4087e;}
	.ft110{font-size:15px;font-family:"Gochi Hand", cursive;color:#e5097f;}
	.ft111{font-size:12px;font-family:"Open Sans", sans-serif;color:#2b2a29;}
	.ft112{font-size:14px;line-height:22px;font-family:"Aref Ruqaa Ink", serif;color:#ffffff;}
	@media print {
            .no-print {
                display: none;
            }
        }
         * {
        transform: scale(1.01); /* Adjust scaling as needed */
        transform-origin: top left;
    }
    -->
    </style>
</head>
<body>
    <div bgcolor="#A0A0A0" vlink="blue" link="blue">
        <div class="container m-3 no-print modal-body">
            <div class="m-2 ">
                <button class="btn btn-primary bg-gradient shadow-sm" onclick="printPage()">Print Form</button>
                <button class="btn btn-primary bg-gradient shadow-sm" onclick="convertHTMLtoPDF()">Save as PDF</button>
                <button class="btn btn-secondary bg-gradient shadow-sm" onclick="window.location.href='retrieve_form.php'">Fill Another form</button>
            </div>
        </div>
        <div id="page1-div" style="position:relative;width:892px;height:1262px;">
            <img width="892" height="1262" src="images/target001.jpg" alt="background image"/>
            <img src="images/E-Rozgaar_Logo.png" alt="erozgaar logo" width="120" style="position:absolute;top:120px;left:20px;"/>
            
            <img src="images/ier_logo.png" alt="IER logo" width="92" style="position:absolute;top:95px;left:480px;"/>
            
            <p style="position:absolute;top:14px;left:297px;white-space:nowrap" class="ft10">Student Admission Form</p>
            <p style="position:absolute;top:70px;left:687px;white-space:nowrap" class="ft11"><b>Form No.:</b></p>
            <p style="position:absolute;top:57px;left:780px;white-space:nowrap" class="ft11-1"> <strong><?php echo $formData['id']; ?></strong></p>
            
            <div class="card" style="width:150px; height:195px; position:absolute;top:115px;left:700px;white-space:nowrap; background:none; align-items:center;"><h1 style="text-align: center;"><img style="position:center; white-space:nowrap;max-height:195px;max-width:150px" src="<?php echo $formData['picture_path']; ?>" alt="Uploaded Picture"/></h1></div>
            
            <p style="position:absolute;top:85px;left:164px;white-space:nowrap" class="ft15"><b>e-Rozgaar Center</b></p>
            <p style="position:absolute;top:158px;left:162px;white-space:nowrap" class="ft112">Institute of Education and Research<br/>University of the Punjab, Lahore</p>
            
            <p style="position:absolute;top:260px;left:17px;white-space:nowrap" class="ft110">Admission Seeking In:</p>
            <p style="position:absolute;top:255px;left:180px;white-space:nowrap" class="ft12-2"><b><?php echo $formData['course']; ?></b></p>
            
            <p style="position:absolute;top:312px;left:15px;white-space:nowrap" class="ft19">Program:</p>
            <p style="position:absolute;top:308px;left:180px;white-space:nowrap" class="ft12-2"><b><?php echo $formData['program']; ?></b></p>
            
            <p style="position:absolute;top:318px;left:708px;white-space:nowrap" class="ft111">Attach a recent passport&#160;</p>
            <p style="position:absolute;top:334px;left:716px;white-space:nowrap" class="ft111">size color photograph</p>
            
            <p style="position:absolute;top:391px;left:96px;white-space:nowrap" class="ft13">Candidate’s Personal Details:</p>
            <p style="position:absolute;top:432px;left:78px;white-space:nowrap" class="ft12"><b>Student Name:&#160;</b></p>
            <p style="position:absolute;top:422px;left:220px;white-space:nowrap" class="ft12-1"><b><?php echo $formData['name']; ?></b></p>
            
            <p style="position:absolute;top:463px;left:78px;white-space:nowrap" class="ft12"><b>Father Name:&#160;</b></p>
            <p style="position:absolute;top:453px;left:220px;white-space:nowrap" class="ft12-1"><b><?php echo $formData['father_name']; ?></b></p>
            
            <p style="position:absolute;top:496px;left:78px;white-space:nowrap" class="ft12"><b>CNIC No.:</b></p>
            <p style="position:absolute;top:486px;left:220px;white-space:nowrap" class="ft12-1"><b><?php echo $formData['cnic']; ?></b></p>
            
            <p style="position:absolute;top:530px;left:78px;white-space:nowrap" class="ft12"><b>Email Address:</b></p>
            <p style="position:absolute;top:520px;left:220px;white-space:nowrap" class="ft12-1"><b><?php echo $formData['email']; ?></b></p>
            
            <p style="position:absolute;top:463px;left:539px;white-space:nowrap" class="ft12"><b>Gender:</b></p>
            <p style="position:absolute;top:453px;left:610px;white-space:nowrap" class="ft12-1"><b><?php echo $formData['gender']; ?></b></p>
            
            <p style="position:absolute;top:496px;left:528px;white-space:nowrap" class="ft12"><b>Mobile No.:</b></p>
            <p style="position:absolute;top:486px;left:610px;white-space:nowrap" class="ft12-1"><b><?php echo $formData['phone']; ?></b></p>
            
            <p style="position:absolute;top:530px;left:516px;white-space:nowrap" class="ft12"><b>Qualification:</b></p>
            <p style="position:absolute;top:520px;left:610px;white-space:nowrap" class="ft12-1"><b><?php echo $formData['qualification']; ?></b></p>
            
            <p style="position:absolute;top:571px;left:96px;white-space:nowrap" class="ft14">Residential Address:</p>
            <p style="position:absolute;top:616px;left:78px;white-space:nowrap" class="ft12"><b>Address:</b></p>
            <p style="position:absolute;top:605px;left:165px;white-space:nowrap" class="ft12-3"><b><?php echo $formData['address']; ?></b></p>
            
            <p style="position:absolute;top:652px;left:78px;white-space:nowrap" class="ft12"><b>City:</b></p>
            <p style="position:absolute;top:647px;left:130px;white-space:nowrap" class="ft12-3"><b><?php echo $formData['city']; ?></b></p>
            
            <p style="position:absolute;top:701px;left:99px;white-space:nowrap" class="ft17">Declaration: معلومات کی تصدیق</p>
            <p style="position:absolute;top:730px;left:78px;white-space:nowrap" class="ft18">فارم میں دی گئی معلومات حقائق پر مبنی ہیں۔ مستقبل میں کوائف کی جانچ پڑتال کے دوران<br> کسی بھی قسم کی غلط معلومات کی صورت میں داخلہ منسوخ کر دیا جائے گا</p>
            <p style="position:absolute;top:860px;left:99px;white-space:nowrap" class="ft17"><b>Date:</b></p>
            
            <p style="position:absolute;top:847px;left:150px;white-space:nowrap" class="ft12-4" id="date"></p>
            <script>
                n =  new Date();
                y = n.getFullYear();
                m = n.getMonth() + 1;
                d = n.getDate();
                document.getElementById("date").innerHTML = d + "-" + m + "-" + y;
            </script>
            
            <p style="position:absolute;top:972px;left:99px;white-space:nowrap" class="ft17"><b>Signature:</b></p>
            <img style="position:absolute;top:640px;left:500px;white-space:nowrap; max-height:490px; max-width:370px" src="<?php echo $formData['challan_path']; ?>" alt="Uploaded Challan"  />
        </div>
    </div>
</body>
</html>

