    <?php
    session_start();

    // Include the database connection file
    include 'db_connect.php';

    // Check if the user is not logged in, redirect to the signin page
    if (!isset($_SESSION['email'])) {
        header("Location: signin.html");
        exit();
    }

    // Initialize variables to store form data
    $name = $secondName = $address = $phoneNo = $faxNo = $email = $department = $productName = $materialUsed = $productSource = $collectorate = $vendorType = $gstRegistrationNo = $gstVendorType = $panNo = $panStatus = $panReferenceNo = $vendorLocation = $aadharCardNo = $vendorCategories = $vendorCreditLimit = $awardType = $awardee = $startingDateCCIC = $originalState = $msme = $msmeType = $msmeRegistrationNo = $concessionaireVendor = $vendorCommission = $minority = $minorityType = $caste = $licenseFee = $discountOfferedByVendor = $pan_image =  $aadhar_card_image = $uploaded_disability_image = $uploaded_image = $passport_details_entry = $upload_caste_certificate = ""; // Initialize other variables as needed

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
        // Retrieve data from $_SESSION and sanitize if necessary
        $name = isset($_SESSION['name_entry']) ? $_SESSION['name_entry'] : '';
        $secondName = isset($_SESSION['name_2_entry']) ? $_SESSION['name_2_entry'] : '';
        $address = isset($_SESSION['address_entry']) ? $_SESSION['address_entry'] : '';
        $phoneNo = isset($_SESSION['phone_no_entry']) ? $_SESSION['phone_no_entry'] : '';
        $faxNo = isset($_SESSION['fax_no_entry']) ? $_SESSION['fax_no_entry'] : '';
        $email = isset($_SESSION['email_entry']) ? $_SESSION['email_entry'] : '';
        $department = isset($_SESSION['department_dropdown']) ? $_SESSION['department_dropdown'] : '';
        $productName = isset($_SESSION['product_name_entry']) ? $_SESSION['product_name_entry'] : '';
        $materialUsed = isset($_SESSION['material_used_entry']) ? $_SESSION['material_used_entry'] : '';
        $productSource = isset($_SESSION['product_source_entry']) ? $_SESSION['product_source_entry'] : '';
        $collectorate = isset($_SESSION['collectorate_entry']) ? $_SESSION['collectorate_entry'] : '';
        $vendorType = isset($_SESSION['vendor_type_entry']) ? $_SESSION['vendor_type_entry'] : '';
        $gstRegistrationNo = isset($_SESSION['gst_registration_no_entry']) ? $_SESSION['gst_registration_no_entry'] : '';
        $gstVendorType = isset($_SESSION['gst_vendor_type_entry']) ? $_SESSION['gst_vendor_type_entry'] : '';
        $panNo = isset($_SESSION['pan_no_entry']) ? $_SESSION['pan_no_entry'] : '';
        $panStatus = isset($_SESSION['pan_status_entry']) ? $_SESSION['pan_status_entry'] : '';
        $panReferenceNo = isset($_SESSION['pan_reference_no_entry']) ? $_SESSION['pan_reference_no_entry'] : '';
        $vendorLocation = isset($_SESSION['vendor_location_entry']) ? $_SESSION['vendor_location_entry'] : '';
        $aadharCardNo = isset($_SESSION['aadhar_card_no_entry']) ? $_SESSION['aadhar_card_no_entry'] : '';
        $vendorCategories = isset($_SESSION['vendor_categories_entry']) ? $_SESSION['vendor_categories_entry'] : '';
        $vendorCreditLimit = isset($_SESSION['vendor_credit_limit_entry']) ? $_SESSION['vendor_credit_limit_entry'] : '';
        $awardType = isset($_SESSION['award_type_entry']) ? $_SESSION['award_type_entry'] : '';
        $awardee = isset($_SESSION['awardee_entry']) ? $_SESSION['awardee_entry'] : '';
        $startingDateCCIC = isset($_SESSION['starting_date_ccic_entry']) ? $_SESSION['starting_date_ccic_entry'] : '';
        $originalState = isset($_SESSION['original_state_entry']) ? $_SESSION['original_state_entry'] : '';
        $msme = isset($_SESSION['msme_entry']) ? $_SESSION['msme_entry'] : '';
        $msmeType = isset($_SESSION['msme_type_entry']) ? $_SESSION['msme_type_entry'] : '';
        $msmeRegistrationNo = isset($_SESSION['msme_registration_no_entry']) ? $_SESSION['msme_registration_no_entry'] : '';
        $concessionaireVendor = isset($_SESSION['concessionaire_vendor_entry']) ? $_SESSION['concessionaire_vendor_entry'] : '';
        $vendorCommission = isset($_SESSION['vendor_commission_entry']) ? $_SESSION['vendor_commission_entry'] : '';
        $minority = isset($_SESSION['minority_entry']) ? $_SESSION['minority_entry'] : '';
        $minorityType = isset($_SESSION['minority_type_entry']) ? $_SESSION['minority_type_entry'] : '';
        $caste = isset($_SESSION['caste_entry']) ? $_SESSION['caste_entry'] : '';
        $licenseFee = isset($_SESSION['license_fee_entry']) ? $_SESSION['license_fee_entry'] : '';
        $discountOfferedByVendor = isset($_SESSION['discount_offered_by_the_vendor_entry']) ? $_SESSION['discount_offered_by_the_vendor_entry'] : '';
        $pan_image = isset($_SESSION['pan_image']) ? $_SESSION['pan_image'] : '';
        $aadhar_card_image = isset($_SESSION['aadhar_card_image']) ? $_SESSION['aadhar_card_image'] : '';
        $uploaded_disability_image = isset($_SESSION['uploaded_disability_image']) ? $_SESSION['uploaded_disability_image'] : '';
        $uploaded_image = isset($_SESSION['uploaded_image']) ? $_SESSION['uploaded_image'] : '';
        $passport_details_entry = isset($_SESSION['passport_details_entry']) ? $_SESSION['passport_details_entry'] : '';
        $upload_caste_certificate = isset($_SESSION['upload_caste_certificate']) ? $_SESSION['upload_caste_certificate'] : '';


        
        $sql = "INSERT INTO userdata (
            `name`, `second_name`, `address`, `phone_no`, `fax_no`, `email`, `department`, 
            `product_name`, `material_used`, `product_source`, `collectorate`, `vendor_type`, 
            `gst_registration_no`, `gst_vendor_type`, `pan_no`, `pan_status`, `pan_reference_no`, 
            `vendor_location`, `aadhar_card_no`, `vendor_categories`, `vendor_credit_limit`, 
            `award_type`, `awardee`, `starting_date_ccic`, `original_state`, `msme`, 
            `msme_type`, `msme_registration_no`, `concessionaire_vendor`, `vendor_commission`, 
            `minority`, `minority_type`, `caste`, `license_fee`, `discount_offered_by_vendor`,`pan_image`,`aadhar_card_image`, 
            `uploaded_disability_image`, `uploaded_image`, `passport_details_entry`, `upload_caste_certificate`) 
            VALUES ('$name', '$secondName', '$address', '$phoneNo', '$faxNo', '$email', '$department', 
            '$productName', '$materialUsed', '$productSource', '$collectorate', '$vendorType', 
            '$gstRegistrationNo', '$gstVendorType', '$panNo', '$panStatus', '$panReferenceNo', 
            '$vendorLocation', '$aadharCardNo', '$vendorCategories', '$vendorCreditLimit', 
            '$awardType', '$awardee', '$startingDateCCIC', '$originalState', '$msme', 
            '$msmeType', '$msmeRegistrationNo', '$concessionaireVendor', '$vendorCommission', 
            '$minority', '$minorityType', '$caste', '$licenseFee', '$discountOfferedByVendor','$pan_image','$aadhar_card_image', 
            '$uploaded_disability_image', '$uploaded_image', '$passport_details_entry', '$upload_caste_certificate')";


            if ($conn->query($sql) === TRUE) {
                session_destroy(); // Destroy all session data
                //Redirect to the website
                echo "<script>
                alert('Registered Successfully!');
                window.location.href = 'https://shoponline.cottageemporium.in/';
                </script>";
                exit(); // Make sure to exit after redirection
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
            ?>
 
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Preview</title>
        <link rel="stylesheet" href="preview.css">

        <script>
            function redirectToGeneral() {
                window.location.href = 'General.php';
            }
        </script>
    </head>

    <body>
        <div class="container">
            <div class="preview-form">
                <img src="login.jpeg" alt="Cottage Image" class="cottage-image">
                <h1 class="heading">Preview</h1>

                <div class="section">
                    <h2>General</h2>
                    <div class="details">
                        <p>Name: <?php echo $_SESSION['name_entry']; ?></p>
                        <p>Second Name: <?php echo $_SESSION['name_2_entry']; ?></p>
                        <p>Address: <?php echo $_SESSION['address_entry']; ?></p>
                        <p>Address 2: <?php echo $_SESSION['address_2_entry']; ?></p>
                        <p>Post Code/City: <?php echo $_SESSION['post_code_city_entry']; ?></p>
                        <p>Country/Region Code: <?php echo $_SESSION['country_region_code_entry']; ?></p>
                        <p>State Code: <?php echo $_SESSION['state_code_entry']; ?></p>
                        <p>Phone: <?php echo $_SESSION['phone']; ?></p>
                        <p>Primary Contact No.: <?php echo $_SESSION['primary_contact_no_entry']; ?></p>
                        <p>Mobile No.: <?php echo $_SESSION['mobile_no_entry']; ?></p>
                        <p>Search Name: <?php echo $_SESSION['search_name_entry']; ?></p>
                        <p>District: <?php echo $_SESSION['district_entry']; ?></p>
                        <p>Gender: <?php echo $_SESSION['gender_entry']; ?></p>
                        <p>Disability: <?php echo $_SESSION['disability_dropdown']; ?></p>
                        <p>Disability Type: <?php echo $_SESSION['disability_type_dropdown']; ?></p>
                        <p>Security Deposit Balance: <?php echo $_SESSION['security_deposit_balance_entry']; ?></p>
                        <p>Date of Submission: <?php echo $_SESSION['date_of_submission']; ?></p>
                    </div>
                </div>

                <div class="section">
                    <h2>Communication</h2>
                    <div class="details">
                        <p>Phone No.: <?php echo $_SESSION['phone_no_entry']; ?></p>
                        <p>Fax No.: <?php echo $_SESSION['fax_no_entry']; ?></p>
                        <p>Email: <?php echo $_SESSION['email_entry']; ?></p>
                        <p>Department: <?php echo $_SESSION['department_dropdown']; ?></p>
                        <p>Product Name: <?php echo $_SESSION['product_name_entry']; ?></p>
                        <p>Material Used: <?php echo $_SESSION['material_used_entry']; ?></p>
                        <p>Product Source: <?php echo $_SESSION['product_source_entry']; ?></p>
                        <!-- Display product image -->
                        <div class="upload-container">
                            <label class="upload-label">Product Image:</label>
                            <span class="upload-preview">
                                <?php if (isset($_SESSION['uploaded_image'])) : ?>
                                    <img src="uploads/product/<?php echo $_SESSION['uploaded_image']; ?>" alt="Product Image" class="final-image-preview">
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h2>Tax Information</h2>
                    <div class="details">
                        <p>Collectorate: <?php echo $_SESSION['collectorate_entry']; ?></p>
                        <p>Vendor Type: <?php echo $_SESSION['vendor_type_entry']; ?></p>
                        <p>GST Registration No.: <?php echo $_SESSION['gst_registration_no_entry']; ?></p>
                        <p>GST Vendor Type: <?php echo $_SESSION['gst_vendor_type_entry']; ?></p>
                        <p>P.A.N. No.: <?php echo $_SESSION['pan_no_entry']; ?></p>
                        <p>P.A.N. Status: <?php echo $_SESSION['pan_status_entry']; ?></p>
                        <p>P.A.N. Reference No.: <?php echo $_SESSION['pan_reference_no_entry']; ?></p>
                        <!-- Display PAN card image -->
                        <div class="upload-container">
                            <label class="upload-label">PAN Card Image:</label>
                            <span class="upload-preview">
                                <?php if (isset($_SESSION['pan_image'])) : ?>
                                    <img src="uploads/pan/<?php echo $_SESSION['pan_image']; ?>" alt="PAN Card Image" class="final-image-preview">
                                <?php endif; ?>
                            </span>
                        </div>
                        <p>Vendor Location: <?php echo $_SESSION['vendor_location_entry']; ?></p>
                        <p>Aadhar Card No.: <?php echo $_SESSION['aadhar_card_no_entry']; ?></p>
                        <!-- Display Aadhar card image -->
                        <div class="upload-container">
                            <label class="upload-label">Aadhar Card Image:</label>
                            <span class="upload-preview">
                                <?php if (isset($_SESSION['aadhar_card_image'])) : ?>
                                    <img src="uploads/aadhar/<?php echo $_SESSION['aadhar_card_image']; ?>" alt="Aadhar Card Image" class="final-image-preview">
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h2>CCIC Information</h2>
                    <div class="details">
                        <p>Vendor Categories: <?php echo $_SESSION['vendor_categories_entry']; ?></p>
                        <p>Vendor Credit Limit: <?php echo $_SESSION['vendor_credit_limit_entry']; ?></p>
                        <p>Award Type: <?php echo $_SESSION['award_type_entry']; ?></p>
                        <p>Awardee: <?php echo $_SESSION['awardee_entry']; ?></p>
                        <p>Approval Date of CCIC: <?php echo $_SESSION['starting_date_ccic_entry']; ?></p>
                        <p>Original State: <?php echo $_SESSION['original_state_entry']; ?></p>
                        <p>MS/ME: <?php echo $_SESSION['msme_entry']; ?></p>
                        <p>MS/ME Type: <?php echo $_SESSION['msme_type_entry']; ?></p>
                        <p>MS/ME Registration No.: <?php echo $_SESSION['msme_registration_no_entry']; ?></p>
                        <p>Concessionaire Vendor: <?php echo $_SESSION['concessionaire_vendor_entry']; ?></p>
                        <p>Vendor Commission %: <?php echo $_SESSION['vendor_commission_entry']; ?></p>
                        <p>Minority: <?php echo $_SESSION['minority_entry']; ?></p>
                        <p>Minority Type: <?php echo $_SESSION['minority_type_entry']; ?></p>
                        <p>Caste: <?php echo $_SESSION['caste_entry']; ?></p>
                        <p>License Fee %: <?php echo $_SESSION['license_fee_entry']; ?></p>
                        <p>Discount Offered by Vendor: <?php echo $_SESSION['discount_offered_by_the_vendor_entry']; ?></p>
                    </div>
                </div>

                <form id="previewForm" method="post" class="buttons">
    <input type="submit" name="confirm" value="Confirm" class="confirm-btn" id="confirmButton">
    <input type="button" class="confirm-btn" name="edit" value="Edit" onclick="redirectToGeneral()" id="editButton">
</form>
<form id="logoutForm" action="logout.php" method="post" class="buttons">
    <input type="submit" name="Exit" value="Exit" class="confirm-btn">
</form>


            </div>
        </div>
        <script src="registration.js" type="application/javascript; charset=utf-8"></script>
    </body>

    </html>