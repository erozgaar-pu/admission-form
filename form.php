<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Rozgaar Form</title>
    <link rel="icon" type="image/x-icon" href="https://www.khateebkhan.com/admission-form/images/E-Rozgaar_Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function toggleMode() {
            const modeField = document.getElementById("mode");
            const courseFieldContainer = document.getElementById("courseFieldContainer");
            const programFieldContainer = document.getElementById("programFieldContainer");
            const batchNumberFieldContainer = document.getElementById("batchNumberFieldContainer");
            const batchNumberField = document.getElementById("batchNumber");
            const courseField = document.getElementById("course");

            // Clear previous options in program field
            courseField.innerHTML = "";

            // Check the selected course and show program options accordingly
            if (modeField.value === "Physical") {
                courseFieldContainer.style.display = "block";
                batchNumberFieldContainer.style.display = "block";
                programFieldContainer.style.display = "none";
                courseField.innerHTML = `
                <option value="" disabled selected>Please Select</option>
                <option value="Web Development">Web Development</option>
                <option value="Graphic Designing">Graphic Designing</option>
                <option value="Content Writing and Digital Marketing">Content Writing and Digital Marketing</option>
                <option value="Python for Machine Learning">Python for Machine Learning</option>
                <option value="Artificial Intelligence">Artificial Intelligence</option>
                <option value="eCommerce">eCommerce</option>
                <option value="Search Engine Optimization">Search Engine Optimization</option>`;
                batchNumberField.innerHTML = `
                <option value="Batch-10" selected>Batch-10</option>`;
            } else if (modeField.value === "Online") {
                courseFieldContainer.style.display = "block";
                batchNumberFieldContainer.style.display = "block";
                programFieldContainer.style.display = "none";
                courseField.innerHTML = `
                <option disabled value="" selected>Please Select</option>
                <option value="Freelancing-Online">Freelancing</option>
                <option value="SEO & Blogging-Online">SEO and Blogging</option>
                <option value="Professional Digital Marketing-Online">Professional Digital Marketing</option>`;
                batchNumberField.innerHTML = `
                <option value="Batch-1" selected>Batch-1</option>`;
            } else {
                courseFieldContainer.style.display = "none";
                courseField.value = "";
            }
        }
    </script>
    <script>
        function toggleProgramField() {
            const courseField = document.getElementById("course");
            const programFieldContainer = document.getElementById("programFieldContainer");
            const programField = document.getElementById("program");

            // Clear previous options in program field
            programField.innerHTML = "";

            // Check the selected course and show program options accordingly
            if (courseField.value === "Web Development" || courseField.value === "Graphic Designing" || courseField.value === "Content Writing and Digital Marketing" || courseField.value === "Search Engine Optimization") {
                programFieldContainer.style.display = "block";
                programField.innerHTML = `
                    <option disabled value="" selected>Please Select</option>
                    <option value="Weekdays (Monday to Friday)">Weekdays (Monday to Friday)</option>
                    <option value="Weekend (Saturday & Sunday)">Weekend (Saturday & Sunday)</option>
                `;
            } else if (courseField.value === "Python for Machine Learning" || courseField.value === "Artificial Intelligence" || courseField.value === "eCommerce") {
                programFieldContainer.style.display = "block";
                programField.innerHTML = `
                    <option disabled value="" selected>Please Select</option>
                    <option value="Weekend (Saturday & Sunday)">Weekend (Saturday & Sunday)</option>
                `;
            } else if (courseField.value === "Freelancing-Online" || courseField.value === "SEO & Blogging-Online" || courseField.value === "Professional Digital Marketing-Online") {
                programFieldContainer.style.display = "block";
                programField.innerHTML = `
                    <option value="Online" selected>Online</option>
                `;
            } else {
                programFieldContainer.style.display = "none";
            }
        }
    </script>
    <script>               
        function showSection(sectionId) {
            // Hide both sections
            document.getElementById('part1').style.display = 'none';
            document.getElementById('part2').style.display = 'none';
            
            // Show the requested section
            document.getElementById(sectionId).style.display = 'block';
        }
        
        function validatePart1() {
            const requiredFields = [
                'mode', 'course', 'program', 'name', 'father_name', 'gender', 'cnic', 'email', 'phone', 'qualification', 'address', 'city'
            ];
        
            let isValid = true;  // Flag to track if all fields are valid
        
            // Loop through each required field and validate
            for (let fieldId of requiredFields) {
                const field = document.getElementById(fieldId);
        
                if (field) {
                    // Check if the field is empty or invalid
                    if (field.value.trim() === "") {
                        // Add 'is-invalid' class to the field to highlight it
                        field.classList.add('is-invalid');
                        field.classList.remove('is-valid'); // Ensure 'is-valid' is removed
                        isValid = false;
                    } else {
                        // Remove 'is-invalid' and add 'is-valid' if the field is filled
                        field.classList.remove('is-invalid');
                        field.classList.add('is-valid');
                    }
                }
            }
        
            // If any field is invalid, show the validation modal
            if (!isValid) {
                $('#validationModal').modal('show');
                return false;  // Prevent further execution (don't go to Part 2)
            }
        
            // If all fields are valid, proceed to Part 2
            showSection('part2');
            return true;
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            const requiredFields = [
                'mode', 'course', 'program', 'name', 'father_name', 'gender', 'cnic', 'email', 'phone', 'qualification', 'address', 'city'
            ];
        
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
        
                if (field) {
                    // Add 'input' event listener for real-time feedback
                    field.addEventListener('input', function () {
                        // Check if the field was invalid previously (has 'is-invalid' class)
                        if (field.classList.contains('is-invalid') && field.value.trim() !== "") {
                            field.classList.remove('is-invalid');
                            field.classList.add('is-valid');
                        }
                    });
                }
            });
        });

        
        function validatePart2() {
            const requiredFields2 = [
                'challan', 'picture'
            ];

            for (let fieldId of requiredFields2) {
                const field = document.getElementById(fieldId);
                if (field && field.value.trim() === "") {
                    $('#validationModal').modal('show');
                    return false; // Stop further execution if validation fails
                }
            }

            // If all fields are filled, go to Part 2
            $('#submitModal').modal('show');
            return true;
        }
        
        
        
        function previewForm() {
        // Copy Part 1 data into hidden preview form
        document.getElementById("preview_mode").value = document.getElementById("mode").value;
        document.getElementById("preview_course").value = document.getElementById("course").value;
        document.getElementById("preview_program").value = document.getElementById("program").value;
        document.getElementById("preview_batchNumber").value = document.getElementById("batchNumber").value;
        document.getElementById("preview_name").value = document.getElementById("name").value;
        document.getElementById("preview_father_name").value = document.getElementById("father_name").value;
        document.getElementById("preview_gender").value = document.getElementById("gender").value;
        document.getElementById("preview_cnic").value = document.getElementById("cnic").value;
        document.getElementById("preview_email").value = document.getElementById("email").value;
        document.getElementById("preview_phone").value = document.getElementById("phone").value;
        document.getElementById("preview_qualification").value = document.getElementById("qualification").value;
        document.getElementById("preview_address").value = document.getElementById("address").value;
        document.getElementById("preview_city").value = document.getElementById("city").value;

        // Submit hidden preview form to preview_submit.php
        document.getElementById("previewForm").action = "preview_submit.php";
        document.getElementById("previewForm").submit();
    }
    </script>
    
    <script>
        // Prevent form submission on Enter key press
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            
            form.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();  // Prevent form submission
                }
            });
        });
    </script>
    
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
    
    <script>
        // Function to format Mobile input
        function formatPhone(input) {
            // Remove all non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Add hyphens in the correct places
            if (value.length >= 4) {
                value = value.slice(0, 4) + '-' + value.slice(4);
            } else if (value.length >= 12) {
                value = value.slice(0, 5) + '-' + value.slice(5, 12) + '-' + value.slice(12, 13);
            }

            // Set the formatted value back to the input field
            input.value = value;
        }
    </script>
    
    
    <style>
        .button {
            display: inline-block;
            text-align: center;
            font-size: 18px;
            padding: 7px;
            width: 150px;
            transition: all 0.5s;
            margin: 5px;
            
        }
        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            
        }
        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
            
        }
        .button:hover span {
            padding-right: 25px;
            
        }
        .button:hover span:after {
            opacity: 1;
            right: 0;
            
        }
        .button2 {
            display: inline-block;
            text-align: center;
            padding: 7px;
            width: 100px;
            transition: all 0.5s;
            margin: 5px;
            
        }
        .button2 span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            
        }
        .button2 span:after {
            content: '\00ab';
            position: absolute;
            opacity: 0;
            top: 0;
            left: -20px;
            transition: 0.5s;
            
        }
        .button2:hover span {
            padding-left: 15px;
            
        }
        .button2:hover span:after {
            opacity: 1;
            left: 0;
            
        }
    </style>
        <style>
        /* Style for the loading overlay */
        #loadingOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            z-index: 9999;
        }
        #loadingOverlay .spinner-grow {
            margin-top: 20%;
        }
    </style>
  </head>
  <body>
    <main class="form-signin m-auto" style="max-width: 700px">
        <img src="/admission-form/images/Banner for Forms.JPG" class="img-fluid rounded-3 shadow mt-2">
        
        <h2 class="text-center display-6">eRozgaar Admission Form</h2>
        
        <div class="container bg-body-tertiary rounded-3 mb-3 border shadow">
            <form action="https://khateebkhan.com/admission-form/submit1.php" method="POST" enctype="multipart/form-data" class="container my-5 needs-validation" id="studentForm" novalidate>
                
                <div id="part1">
                <div class="row g-2 form-floating">
                    <div class="col-md-6 form-floating mb-2">
                        <select class="form-select" id="mode" name="mode" placeholder="Please Select" autocomplete="on" onchange="toggleMode()" required>
                            <option value="" disabled selected>Please Select</option>
                            <option value="Physical">Physical (Face to Face) On-Campus</option>
                            <option value="Online">Online</option>
                        </select>
                        <label for="mode" class="form-label">Please selct your mode of learning</label>
                    </div>
                    <div class="col-md-6 form-floating mb-2" id="batchNumberFieldContainer" style="display: none;">
                        <select class="form-select" id="batchNumber" name="batchNumber" placeholder="Please Select" autocomplete="on" required >
                            <option value="Batch-1" disabled>Batch-1</option>
                            <option value="Batch-10" disabled>Batch-10</option>
                        </select>
                        <label for="batchNumber" class="form-label">Batch Number</label>
                    </div>                
                    <div class="col-md-6 form-floating mb-2" id="courseFieldContainer" style="display: none;">
                        <select class="form-select" id="course" name="course" placeholder="Please Select" autocomplete="on" onchange="toggleProgramField()" required>
                            <option value="" disabled selected >Please Select</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Graphic Designing">Graphic Designing</option>
                            <option value="Content Writing and Digital Marketing">Content Writing and Digital Marketing</option>
                            <option value="Python for Machine Learning">Python for Machine Learning</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option>
                            <option value="eCommerce">eCommerce</option>
                            <option value="Search Engine Optimization">Search Engine Optimization</option>
                        </select>
                        <label for="course" class="form-label">Course</label>
                    </div>
                    <div class="col-md-6 form-floating mb-2" id="programFieldContainer" style="display: none;">
                        <select class="form-select" id="program" name="program" placeholder="Please Select">
                            <!-- Program options will be dynamically added here based on the selected course -->                            
                        </select>
                        <label for="program" class="form-label">Program</label>
                    </div>
                </div>
                <div class="form-floating mb-2 position-relative">
                    <input type="text" class="form-control" id="name" name="name" autocomplete="on" placeholder="" required>
                    <label for="name" class="form-label">Name</label>
                    
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="father_name" name="father_name" autocomplete="on" placeholder="" required>
                    <label for="father_name" class="form-label">Father's Name</label>
                </div>
                <div class="row g-2">
                    <div class="col-md-6 form-floating mb-2">
                        <select class="form-select" id="gender" name="gender" placeholder="Please Select" autocomplete="on" required>
                            <option selected disabled value="">Please Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender" class="form-label">Gender</label>
                    </div>
                    <div class="col-md-6 form-floating mb-2">
                        <input type="tel" class="form-control" id="cnic" name="cnic" autocomplete="on" placeholder="11111-1111111-1" maxlength="15" oninput="formatCNIC(this)" required>
                        <label for="cnic">CNIC</label>
                    </div>
                </div>
                
                <div<div class="row g-2">
                <div class="col-md-6 form-floating mb-2">
                  <input type="email" class="form-control" id="email" name="email" autocomplete="on" placeholder="name@example.com"  required>
                  <label for="email">Email address</label>
                </div>
                
                <div class="col-md-6 form-floating mb-2">
                  <input type="tel" class="form-control" id="phone" name="phone" autocomplete="on" placeholder="0123-456789" maxlength="12" oninput="formatPhone(this)" required>
                  <label for="phone">Mobile Number</label>
                </div>
                <div class="form-floating mb-2">                                <select class="form-select" id="qualification" name="qualification" autocomplete="on" placeholder="Please Select" autocomplete="on" required>
                        <option selected disabled value="">Please Select</option>
                        <option value="UnderMatric">Matric Result Awaiting</option>
                        <option value="Matric">Matric</option>
                        <option value="UnderInter">Intermediate Result Awaiting</option>
                        <option value="Inter">Intermediate</option>
                        <option value="BA">Bachelor (14-years education)</option>
                        <option value="BS-MA">Masters/BS (16-years education)</option>
                        <option value="MPhil-PhD">MPhil/PhD</option>
                    </select>
                    <label for="qualification" class="form-label">Qualification</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" class="form-control" id="address" name="address" placeholder="" required>
                    <label for="address" class="form-label">Address</label>
                </div>
    
                <div class="mb-2 form-floating">
                    <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                    <label for="city" class="form-label">City</label>
                </div>
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="reverseCheck1" checked required>
                    <label class="form-check-label" for="reverseCheck1">
                        فارم میں دی گئی معلومات حقائق پر مبنی ہیں۔ مستقبل میں کوائف کی جانچ پڑتال کے دوران کسی بھی قسم کی غلط معلومات کی صورت میں داخلہ منسوخ کر دیا جائے گا۔
                    </label>
                </div>
                <button type="button" class="btn btn-primary bg-gradient shadow-sm button" style="vertical-align:middle" onclick="validatePart1()"><span>Next</span></button>
                </div>
                
                
                <div id="part2" style="display: none;">
                    <div class="row g-2">
                        <div class="mb-3">
                            <div class="container bg-light rounded-2 border shadow-sm">
                                <label for="challan" class="form-label" style="color:#900000; font-size: large">Upload Challan</label>
                                <p>Upload your paid challan form. You can take print of the challan by clicking the button below:</p><p class = "col text-center"><button type="button" class="btn btn-info bg-gradient btn-sm shadow-sm" target="_blank" onclick="previewForm()">Generate Challan</button></p><p>Alternatively, You can submit the fee in any HBL branch with following details:<br> <b>Account Title:</b> Director IER Self<br> <b>Account Number: </b>0182 0025074103<br> <b>Bank: </b>Habib Bank Limited (HBL)<p>Upload the Transaction/Transfer receipt</p></p>
                                <input type="file" class="form-control mb-3" id="challan" name="challan" accept="image/*" required>
                                </div>
                        </div>
                        <div class="mb-3 ">
                            <div class="container bg-light rounded-2 border shadow-sm">
                                <label for="picture" class="form-label" style="color:#900000; font-size: large">Upload Your Latest Passport Size Picture</label>
                                <input type="file" class="form-control mb-3" id="picture" name="picture" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary bg-gradient shadow-sm button2" onclick="showSection('part1')"><span>Back</span></button>
                    <button type="button" class="btn btn-primary bg-gradient col-md-3 shadow-sm" onclick="validatePart2()">Submit
                    </button>
                </div>
                
                <!-- Bootstrap Modal -->
        <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="submitModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="submitModalLabel">Confirm Form Submission!</h5>
                        <h2></h2>
                    </div>
                    <div class="modal-body">
                        <p><b>Do you want to submit your form?</b></p>
                        <p>You will be informed about the starting date of classe at your provided email address.</p>
                        <p>Follow our Social Media for Latest Updates:<br><a href="https://www.facebook.com/erozgaarcenterier" data-bs-toggle="tooltip" title="Facebook">Facebook</a><br><a href="https://www.instagram.com/erozgaar.pu/" data-bs-toggle="tooltip" title="Instagram">Instagram</a><br><a href="https://whatsapp.com/channel/0029VacHouJC6ZvqhkgJH630" data-bs-toggle="tooltip" title="WhatsApp">WhatsApp</a></p>
                        
                    </div>
                    <div class="modal-footer ">
                        <div class="d-flex justify-content-around modal-body">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal" data-placement="top" onclick="closeModal()">Close</button>
                        <button type="submit" class="btn btn-primary mx-2" data-toggle="tooltip" data-placement="top" title="Submit Form" onclick="submitForm();">Submit Form</button>
                        <!-- Go back to form button with tooltip -->
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Go back to edit your form" onclick="closeModal()">Go back to form</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
            </form>
            
            <form id="previewForm" action="https://khateebkhan.com/admission-form/challan.php" method="POST" target="_blank" style="display: none;">
                <input type="hidden" name="mode" id="preview_mode">
                <input type="hidden" name="course" id="preview_course">
                <input type="hidden" name="program" id="preview_program">
                <input type="hidden" name="batchNumber" id="preview_batchNumber">
                <input type="hidden" name="name" id="preview_name">
                <input type="hidden" name="father_name" id="preview_father_name">
                <input type="hidden" name="gender" id="preview_gender">
                <input type="hidden" name="cnic" id="preview_cnic">
                <input type="hidden" name="email" id="preview_email">
                <input type="hidden" name="phone" id="preview_phone">
                <input type="hidden" name="qualification" id="preview_qualification">
                <input type="hidden" name="address" id="preview_address">
                <input type="hidden" name="city" id="preview_city">
            </form>
        </div>
        
        
        <!-- Loading Overlay -->

<div id="loadingOverlay">
    <div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <h5 class="mt-3">Please wait, your form is being submitted...</h5>
</div>

<script>
    // Attach event listener to the form submit action
    document.getElementById('studentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent immediate form submission
        showLoadingOverlay();   // Show the overlay

        // Delay submission slightly to let the overlay render
        setTimeout(() => {
            this.submit(); // Submit the form programmatically
        }, 50);
    });

    // Function to show the loading overlay
    function showLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'block';
    }
</script>
        
        <script>
        // Function to open the modal on form submit
        function openSubmitModal() {
            
            
            // Show the Bootstrap modal
            $('#submitModal').modal('show');
            
            // Initialize tooltips for the modal buttons
            $('[data-toggle="tooltip"]').tooltip();
            }
            
            // Function to redirect to display.php when "Print" is clicked
            function submitForm() {
                document.getElementById("studentForm").submit();
            }
            
            // Function to close the modal when "Close" is clicked
            function closeModal() {
                $('#submitModal').modal('hide');
            }
            function closeModal2() {
                $('#validationModal').modal('hide');
            }
        </script>
        
        <script>
    function submitGoogleSheet() {
      const form = document.getElementById('studentForm');
      const formData = new FormData(form);
      
      fetch('https://script.google.com/macros/s/AKfycbzEHTUxFFaNacIfJ78NJRVJhP30wQPrTwjBnlYW6k7W/dev', {
        method: 'POST',
        mode: 'no-cors',
        body: formData
      }).then(() => {
        alert('Form submitted successfully!');
        form.reset();
      }).catch(error => {
        alert('Error submitting form');
        console.error(error);
      });
    }
  </script>

        <!-- Validation Error Modal -->
<div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="validationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validationModalLabel">Form Incomplete</h5>
            </div>
            <div class="modal-body">
                <p>Please fill out all required fields before proceeding to the next part of the form.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal" data-placement="top" onclick="closeModal2()">Close</button>
            </div>
        </div>
    </div>
</div>
        <p style="display:none">Visitors so far: <span id="visitorCount"></span></p>

    <script>
        // This function fetches the visitor count from the PHP backend
        function fetchVisitorCount() {
            fetch('visitor_counter.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('visitorCount').innerText = data;
                })
                .catch(error => console.error('Error fetching the visitor count:', error));
        }

        // Call the function to fetch and display the visitor count on page load
        window.onload = fetchVisitorCount;
    </script>
    </main>
</body>
</html>
