<?php
// preview.php

session_start();

// Database connection
include('/home/khatqzcj/public_html/admission-form/db_connect.php');

// Get the latest entry
$sql = "SELECT * FROM challanEntries ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Form</title>
    <link rel="icon" type="image/x-icon" href="https://www.khateebkhan.com/wp-content/uploads/2024/11/cropped-favicon_new-300x300-1.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
    </script>
    <style>
        body {
                width: 100%;
                height: 100%;
            }
        
        
        @media print {
            .no-print {
                display: none !important;
            }
        }
        @page
            { size: A4 landscape;
            margin: 5mm;
            }
        div.opacity {
            opacity: 0.1;
            }
    </style>
    <style type="text/css" media="print">
        @page {size:A4 landscape; }
    </style>
    <script>
        function printPage() { window.print(); }
    </script>
    <script type="text/javascript">
        function convertHTMLtoPDF() {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('l', 'mm', 'a4');
            const dpi = 150;
            const divElement = document.querySelector("#divID");
    
            html2canvas(divElement, {
                scale: 1.5,
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                pdf.addImage(imgData, 'PNG', 5, 5, 287, 200);
                pdf.save('challan.pdf');
            });
        }
    </script>
</head>
<body onload="window.print();">
    <div class="page m-3" id="divID" style="width: 35cm; height: 23cm;">
        <table id="challan" border="0" style="width:100%;height:100%;" cellspacing="10" >
            <tr>
                <td style="width:33.33%;" class="px-3">
                    <table width="100%" height="100%" border="0"  >
                        <tr>
                            <td colspan="3">
                                <table width="100%" height="100%" border="0">
                                    <tr>
                                        <td  style="width: 25%;"> <img id="logo" src="/admission-form/images/HBL-logo.png" height="20" alt="logo" style="vertical-align:middle;float:left;"> </td><td style="float:right;"><span><b>Bank Copy</b></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td colspan="3">Dated: <u id="date"></u> <label style="float:right;">Challan No.<span><b><u>  <?php echo $row['id']; ?>  </u></b></span></label></td> </tr>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = d + "-" + m + "-" + y;
</script>
                        <tr><td colspan="3"><center><img src="/admission-form/images/E-Rozgaar_Logo.png" height="105" alt="logo"><br>Institute of Education and Research<br><b><u>Account No. 01820025074103</u></b><br>Credit: Dir IER Self Supporting Program<br>Acceptable in all online branches of Lahore</center></td></tr>
                        
                        
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Name : <u>   <?php echo $row['name']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Father Name : <u>   <?php echo $row['father_name']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;">CNIC : <u>  <?php echo $row['cnic']; ?></u> <font size="3" style="float:right;">Mobile No. : <u>  <?php echo $row['phone']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Course Name : <u>   <?php echo $row['course']; ?></u></font></td></tr>
                        
                        <tr><td colspan="3"><center><div class="opacity"><img  src="/admission-form/images/ier_logo.png" height="200" alt="logo"></div></center></td></tr>
                        
                        <tr><td colspan="3">
                            <table align="center" cellspacing="0" class="challan" width="100%" >
                                <tr>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Sr.# </b></td>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Title </b></td>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Rs.</b></td>
                                </tr>
								<tr style="line-height:1em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">1 </td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">ADMISSION PROCESSING FEE </td>
								    <td style="text-align:right;border:1px solid black ;font-size:15px; font-family:Arial, Helvetica, sans-serif">1,000 </td>
								</tr>
								<tr style="line-height:1em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">2 </td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">COURSE FEE </td>
								    <td style="text-align:right;border:1px solid black ;font-size:15px; font-family:Arial, Helvetica, sans-serif"><?php if ($row['course'] == 'Freelancing') {
								        echo '9,000'; 
								        } else {
								        echo '19,000';
								        }?></td>
								</tr>
								<tr style="line-height:1.5em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black;font-size:15px;"></td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black;font-size:15px;"><b>Total Rs.</b></td>
								    <td style="text-align:right;border:1px solid black;font-size:15px;"><b><?php if ($row['course'] == 'Freelancing') {
								        echo '10,000'; 
								        } else {
								        echo '20,000';
								        }?></b></td>
								</tr>
								<tr style="line-height:1.5em;">
								    <td style="padding-left:4px;padding-right:4px; font-size:14px; font-family:Arial, Helvetica, sans-serif" colspan="3">Total (Rs. in Words): <u>Twenty Thousand Only.</u></td>
								</tr>
							</table></td>
						</tr>
						<tr><td colspan="3">&nbsp;</td></tr>
						<tr><td colspan="3">&nbsp;</td></tr>
						<tr><td colspan="3">
						    <span style="float:left">Bank Officer_________________ </span> <span style="float:right">A.T. IER _________________</span>
						</td></tr>
					</table>
				</td>
				
				<td style="width:33.33%;" class="px-3">
                    <table width="100%" height="100%" border="0"  >
                        <tr>
                            <td colspan="3">
                                <table width="100%" height="100%" border="0">
                                    <tr>
                                        <td  style="width: 25%;"> <img id="logo" src="/admission-form/images/HBL-logo.png" height="20" alt="logo" style="vertical-align:middle;float:left;"> </td><td style="float:right;"><span><b>Treasurer's Copy</b></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td colspan="3">Dated: <u id="date1"></u> <label style="float:right;">Challan No.<span><b><u>  <?php echo $row['id']; ?>  </u></b></span></label></td> </tr>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date1").innerHTML = d + "-" + m + "-" + y;
</script>
                        <tr><td colspan="3"><center><img src="/admission-form/images/E-Rozgaar_Logo.png" height="105" alt="logo"><br>Institute of Education and Research<br><b><u>Account No. 01820025074103</u></b><br>Credit: Dir IER Self Supporting Program<br>Acceptable in all online branches of Lahore</center></td></tr>
                        
                        
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Name : <u>   <?php echo $row['name']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Father Name : <u>   <?php echo $row['father_name']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;">CNIC : <u>  <?php echo $row['cnic']; ?></u> <font size="3" style="float:right;">Mobile No. : <u>  <?php echo $row['phone']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Course Name : <u>   <?php echo $row['course']; ?></u></font></td></tr>
                        
                        <tr><td colspan="3"><center><div class="opacity"><img  src="/admission-form/images/ier_logo.png" height="200" alt="logo"></div></center></td></tr>
                        
                        <tr><td colspan="3">
                            <table align="center" cellspacing="0" class="challan" width="100%" >
                                <tr>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Sr.# </b></td>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Title </b></td>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Rs.</b></td>
                                </tr>
								<tr style="line-height:1em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">1 </td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">ADMISSION PROCESSING FEE </td>
								    <td style="text-align:right;border:1px solid black ;font-size:15px; font-family:Arial, Helvetica, sans-serif">1,000 </td>
								</tr>
								<tr style="line-height:1em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">2 </td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">COURSE FEE </td>
								    <td style="text-align:right;border:1px solid black ;font-size:15px; font-family:Arial, Helvetica, sans-serif"><?php if ($row['course'] == 'Freelancing') {
								        echo '9,000'; 
								        } else {
								        echo '19,000';
								        }?></td>
								</tr>
								<tr style="line-height:1.5em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black;font-size:15px;"></td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black;font-size:15px;"><b>Total Rs.</b></td>
								    <td style="text-align:right;border:1px solid black;font-size:15px;"><b><?php if ($row['course'] == 'Freelancing') {
								        echo '10,000'; 
								        } else {
								        echo '20,000';
								        }?></b></td>
								</tr>
								<tr style="line-height:1.5em;">
								    <td style="padding-left:4px;padding-right:4px; font-size:14px; font-family:Arial, Helvetica, sans-serif" colspan="3">Total (Rs. in Words): <u>Twenty Thousand Only.</u></td>
								</tr>
							</table></td>
						</tr>
						<tr><td colspan="3">&nbsp;</td></tr>
						<tr><td colspan="3">&nbsp;</td></tr>
						<tr><td colspan="3">
						    <span style="float:left">Bank Officer_________________ </span> <span style="float:right">A.T. IER _________________</span>
						</td></tr>
					</table>
				</td>
				
				<td style="width:33.33%;" class="px-3">
                    <table width="100%" height="100%" border="0"  >
                        <tr>
                            <td colspan="3">
                                <table width="100%" height="100%" border="0">
                                    <tr>
                                        <td  style="width: 25%;"> <img id="logo" src="/admission-form/images/HBL-logo.png" height="20" alt="logo" style="vertical-align:middle;float:left;"> </td><td style="float:right;"><span><b>Depositor's Copy</b></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td colspan="3">Dated: <u id="date2"></u> <label style="float:right;">Challan No.<span><b><u>  <?php echo $row['id']; ?>  </u></b></span></label></td> </tr>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date2").innerHTML = d + "-" + m + "-" + y;
</script>
                        <tr><td colspan="3"><center><img src="/admission-form/images/E-Rozgaar_Logo.png" height="105" alt="logo"><br>Institute of Education and Research<br><b><u>Account No. 01820025074103</u></b><br>Credit: Dir IER Self Supporting Program<br>Acceptable in all online branches of Lahore</center></td></tr>
                        
                        
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Name : <u>   <?php echo $row['name']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Father Name : <u>   <?php echo $row['father_name']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;">CNIC : <u>  <?php echo $row['cnic']; ?></u> <font size="3" style="float:right;">Mobile No. : <u>  <?php echo $row['phone']; ?></u></font></td></tr>
                        <tr><td colspan="3" style="border-bottom:1px solid;"><font size="3">Course Name : <u>   <?php echo $row['course']; ?></u></font></td></tr>
                        
                        <tr><td colspan="3"><center><div class="opacity"><img  src="/admission-form/images/ier_logo.png" height="200" alt="logo"></div></center></td></tr>
                        
                        <tr><td colspan="3">
                            <table align="center" cellspacing="0" class="challan" width="100%" >
                                <tr>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Sr.# </b></td>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Title </b></td>
                                    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif"><b>Rs.</b></td>
                                </tr>
								<tr style="line-height:1em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">1 </td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">ADMISSION PROCESSING FEE </td>
								    <td style="text-align:right;border:1px solid black ;font-size:15px; font-family:Arial, Helvetica, sans-serif">1,000 </td>
								</tr>
								<tr style="line-height:1em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">2 </td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black; font-size:15px; font-family:Arial, Helvetica, sans-serif">COURSE FEE </td>
								    <td style="text-align:right;border:1px solid black ;font-size:15px; font-family:Arial, Helvetica, sans-serif"><?php if ($row['course'] == 'Freelancing') {
								        echo '9,000'; 
								        } else {
								        echo '19,000';
								        }?></td>
								</tr>
								<tr style="line-height:1.5em;">
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black;font-size:15px;"></td>
								    <td style="padding-left:4px;padding-right:4px;border:1px solid black;font-size:15px;"><b>Total Rs.</b></td>
								    <td style="text-align:right;border:1px solid black;font-size:15px;"><b><?php if ($row['course'] == 'Freelancing') {
								        echo '10,000'; 
								        } else {
								        echo '20,000';
								        }?></b></td>
								</tr>
								<tr style="line-height:1.5em;">
								    <td style="padding-left:4px;padding-right:4px; font-size:14px; font-family:Arial, Helvetica, sans-serif" colspan="3">Total (Rs. in Words): <u>Twenty Thousand Only.</u></td>
								</tr>
							</table></td>
						</tr>
						<tr><td colspan="3">&nbsp;</td></tr>
						<tr><td colspan="3">&nbsp;</td></tr>
						<tr><td colspan="3">
						    <span style="float:left">Bank Officer_________________ </span> <span style="float:right">A.T. IER _________________</span>
						</td></tr>
					</table>
				</td>
				
				
			</tr>
		</table>
    </div>
    <div class="m-2 text-center">
    <a href="form.php" class="btn btn-primary bg-gradient no-print mx-2">Back to Form</a>
    <button class="btn btn-primary bg-gradient shadow-sm no-print" onclick="printPage()">Print Challan</button>
    <button class="btn btn-primary bg-gradient shadow-sm no-print" onclick="convertHTMLtoPDF()">Save as PDF</button>
    </div>
</body>
</html>
