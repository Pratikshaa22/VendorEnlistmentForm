<?php
session_start();

// Check if the user is not logged in, redirect to the signin page
if (!isset($_SESSION['email'])) {
    header("Location: signin.html");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if session data exists
    if (isset($_SESSION['name_entry']) && isset($_SESSION['name_2_entry']) && isset($_SESSION['address_entry']) && isset($_SESSION['address_2_entry']) && isset($_SESSION['post_code_city_entry']) && isset($_SESSION['country_region_code_entry']) && isset($_SESSION['state_code_entry']) && isset($_SESSION['phone']) && isset($_SESSION['primary_contact_no_entry']) && isset($_SESSION['mobile_no_entry']) && isset($_SESSION['search_name_entry']) && isset($_SESSION['district_entry']) && isset($_SESSION['gender_entry']) && isset($_SESSION['disability_dropdown']) && isset($_SESSION['disability_type_dropdown']) && isset($_SESSION['security_deposit_balance_entry']) && isset($_SESSION['date_of_submission']) && isset($_SESSION['global_dimension_1_code_entry']) && isset($_SESSION['global_dimension_2_code_entry'])) {

        // Compare submitted data with session data and update if necessary
        $updated = false;
        if ($_POST['name_entry'] != $_SESSION['name_entry']) {
            $_SESSION['name_entry'] = $_POST['name_entry'];
            $updated = true;
        }
        if ($_POST['name_2_entry'] != $_SESSION['name_2_entry']) {
            $_SESSION['name_2_entry'] = $_POST['name_2_entry'];
            $updated = true;
        }
        if ($_POST['address_entry'] != $_SESSION['address_entry']) {
            $_SESSION['address_entry'] = $_POST['address_entry'];
            $updated = true;
        }
        if ($_POST['address_2_entry'] != $_SESSION['address_2_entry']) {
            $_SESSION['address_2_entry'] = $_POST['address_2_entry'];
            $updated = true;
        }
        if ($_POST['post_code_city_entry'] != $_SESSION['post_code_city_entry']) {
            $_SESSION['post_code_city_entry'] = $_POST['post_code_city_entry'];
            $updated = true;
        }
        if ($_POST['country_region_code_entry'] != $_SESSION['country_region_code_entry']) {
            $_SESSION['country_region_code_entry'] = $_POST['country_region_code_entry'];
            $updated = true;
        }
        if ($_POST['state_code_entry'] != $_SESSION['state_code_entry']) {
            $_SESSION['state_code_entry'] = $_POST['state_code_entry'];
            $updated = true;
        }
        if ($_POST['phone'] != $_SESSION['phone']) {
            $_SESSION['phone'] = $_POST['phone'];
            $updated = true;
        }
        if ($_POST['primary_contact_no_entry'] != $_SESSION['primary_contact_no_entry']) {
            $_SESSION['primary_contact_no_entry'] = $_POST['primary_contact_no_entry'];
            $updated = true;
        }
        if ($_POST['mobile_no_entry'] != $_SESSION['mobile_no_entry']) {
            $_SESSION['mobile_no_entry'] = $_POST['mobile_no_entry'];
            $updated = true;
        }
        if ($_POST['search_name_entry'] != $_SESSION['search_name_entry']) {
            $_SESSION['search_name_entry'] = $_POST['search_name_entry'];
            $updated = true;
        }
        if ($_POST['district_entry'] != $_SESSION['district_entry']) {
            $_SESSION['district_entry'] = $_POST['district_entry'];
            $updated = true;
        }
        if ($_POST['gender_entry'] != $_SESSION['gender_entry']) {
            $_SESSION['gender_entry'] = $_POST['gender_entry'];
            $updated = true;
        }
        if ($_POST['disability_dropdown'] != $_SESSION['disability_dropdown']) {
            $_SESSION['disability_dropdown'] = $_POST['disability_dropdown'];
            $updated = true;
        }
        if ($_POST['disability_type_dropdown'] != $_SESSION['disability_type_dropdown']) {
            $_SESSION['disability_type_dropdown'] = $_POST['disability_type_dropdown'];
            $updated = true;

        // Check if a file is uploaded
        

        }
        if ($_POST['security_deposit_balance_entry'] != $_SESSION['security_deposit_balance_entry']) {
            $_SESSION['security_deposit_balance_entry'] = $_POST['security_deposit_balance_entry'];
            $updated = true;
        }
        if ($_POST['date_of_submission'] != $_SESSION['date_of_submission']) {
            $_SESSION['date_of_submission'] = $_POST['date_of_submission'];
            $updated = true;
        }
        if ($_POST['global_dimension_1_code_entry'] != $_SESSION['global_dimension_1_code_entry']) {
            $_SESSION['global_dimension_1_code_entry'] = $_POST['global_dimension_1_code_entry'];
            $updated = true;
        }
        if ($_POST['global_dimension_2_code_entry'] != $_SESSION['global_dimension_2_code_entry']) {
            $_SESSION['global_dimension_2_code_entry'] = $_POST['global_dimension_2_code_entry'];
            $updated = true;
        }

        // Display alert if form is updated
        if ($updated = true) {
            echo "<script>alert('Form has been updated');</script>";
        }
    } else {
        // If session data doesn't exist, initialize it
        $_SESSION['name_entry'] = $_POST['name_entry'];
        $_SESSION['name_2_entry'] = $_POST['name_2_entry'];
        $_SESSION['address_entry'] = $_POST['address_entry'];
        $_SESSION['address_2_entry'] = $_POST['address_2_entry'];
        $_SESSION['post_code_city_entry'] = $_POST['post_code_city_entry'];
        $_SESSION['country_region_code_entry'] = $_POST['country_region_code_entry'];
        $_SESSION['state_code_entry'] = $_POST['state_code_entry'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['primary_contact_no_entry'] = $_POST['primary_contact_no_entry'];
        $_SESSION['mobile_no_entry'] = $_POST['mobile_no_entry'];
        $_SESSION['search_name_entry'] = $_POST['search_name_entry'];
        $_SESSION['district_entry'] = $_POST['district_entry'];
        $_SESSION['gender_entry'] = $_POST['gender_entry'];
        $_SESSION['disability_dropdown'] = $_POST['disability_dropdown'];
        $_SESSION['disability_type_dropdown'] = $_POST['disability_type_dropdown'];
        $_SESSION['security_deposit_balance_entry'] = $_POST['security_deposit_balance_entry'];
        $_SESSION['date_of_submission'] = $_POST['date_of_submission'];
        $_SESSION['global_dimension_1_code_entry'] = $_POST['global_dimension_1_code_entry'];
        $_SESSION['global_dimension_2_code_entry'] = $_POST['global_dimension_2_code_entry'];

        echo "<script>alert('Form has been saved');</script>";
    }

    // Redirect to Communication.php
    header("Location: Communication.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General </title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
<marquee direction="left" behavior="alternate" 
     style="border: Black 1px solid  "  >The Endover is to Market/promote the Indian Handicrafts and Handlooms.</marquee>
     <div class="nav">
 <img src="login.jpeg" alt="Cottage Image" class="cottage-image">
   <h2 style="text-align: center; padding-left: 7%; color:black; text-transform:uppercase; background:radial-gradient(50% 50%, ellipse closest-side, #444, black);"> Welcome to the Enlistment of Craft Person & Artisions of India</h2></div>
    <header>
        <nav>
            <ul>
                <li class="general disabled"> <a href="general.php">Step 1</li>
                <li class="disabled"><a href="Communication.php">Step 2</a></li>
                <li class="disabled"><a href="Tax-Information.php">Step 3</a></li>
                <li class="disabled"><a href="CCIC.php">Step 4</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="general" class="section">
        <h2>Basic Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="myform" onsubmit="return validateform()" id="general-form" method="post">
            <div class="column-container">
                <div class="column">
                    <label for="name_entry" class="required">Name:</label>
                    <input type="text" id="name_entry" name="name_entry" value="<?php echo isset($_SESSION['name_entry']) ? $_SESSION['name_entry'] : ''; ?>">

                    <label for="name_2_entry">Name 2:</label>
                    <input type="text" id="name_2_entry" name="name_2_entry" value="<?php echo isset($_SESSION['name_2_entry']) ? $_SESSION['name_2_entry'] : ''; ?>">

                    <label for="address_entry" class="required">Address:</label>
                    <input type="text" id="address_entry" name="address_entry" value="<?php echo isset($_SESSION['address_entry']) ? $_SESSION['address_entry'] : ''; ?>" required>

                    <label for="address_2_entry">Address 2:</label>
                    <input type="text" id="address_2_entry" name="address_2_entry" value="<?php echo isset($_SESSION['address_2_entry']) ? $_SESSION['address_2_entry'] : ''; ?>">

                    <label for="post_code_city_entry" class="required">Post Code/City:</label>
                    <input type="text" id="post_code_city_entry" name="post_code_city_entry" value="<?php echo isset($_SESSION['post_code_city_entry']) ? $_SESSION['post_code_city_entry'] : ''; ?>" required>

                    <label for="country_region_code_entry" class="required">Country/Region:</label>
                    <input type="text" id="country_region_code_entry" name="country_region_code_entry" value="<?php echo isset($_SESSION['country_region_code_entry']) ? $_SESSION['country_region_code_entry'] : ''; ?>" required>

                    <label for="state_code_entry" class="required">State Code:</label>
                    <input type="text" id="state_code_entry" name="state_code_entry" value="<?php echo isset($_SESSION['state_code_entry']) ? $_SESSION['state_code_entry'] : ''; ?>" required>


                    <label for="phone" class="required">Phone No.:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>" required>
                    <span class="formerror"></span>
                    <div id="phone-error" class="error-message"></div> 

                    <label for="primary_contact_no_entry" class="required">Primary Contact No.:</label>
                    <input type="text" id="primary_contact_no_entry" name="primary_contact_no_entry" value="<?php echo isset($_SESSION['primary_contact_no_entry']) ? $_SESSION['primary_contact_no_entry'] : ''; ?>" required>

                    <label for="mobile_no_entry">Mobile No.:</label>
                    <input type="text" id="mobile_no_entry" name="mobile_no_entry" value="<?php echo isset($_SESSION['mobile_no_entry']) ? $_SESSION['mobile_no_entry'] : ''; ?>">

                </div>
                <div class="column">

                    <label for="search_name_entry">Search Name:</label>
                    <input type="text" id="search_name_entry" name="search_name_entry" value="<?php echo isset($_SESSION['search_name_entry']) ? $_SESSION['search_name_entry'] : ''; ?>">

                    <label for="district_entry">District:</label>
                    <input type="text" id="district_entry" name="district_entry" value="<?php echo isset($_SESSION['district_entry']) ? $_SESSION['district_entry'] : ''; ?>">

                    <label for="gender_entry">Gender:</label>
                    <select id="gender_entry" name="gender_entry">
                        <option value="">Select Gender</option>
                        <option value="male" <?php echo (isset($_SESSION['gender_entry']) && $_SESSION['gender_entry'] == 'male') ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo (isset($_SESSION['gender_entry']) && $_SESSION['gender_entry'] == 'female') ? 'selected' : ''; ?>>Female</option>
                        <option value="other" <?php echo (isset($_SESSION['gender_entry']) && $_SESSION['gender_entry'] == 'other') ? 'selected' : ''; ?>>Other</option>
                    </select>

                        <label for="disability_dropdown">Do you have a disability?</label>
                        <select id="disability_dropdown" name="disability_dropdown" onchange="toggleDisabilityType()">
                            <option value="select">Select</option>
                            <option value="yes" <?php echo (isset($_SESSION['disability_dropdown']) && $_SESSION['disability_dropdown'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                            <option value="no" <?php echo (isset($_SESSION['disability_dropdown']) && $_SESSION['disability_dropdown'] == 'no') ? 'selected' : ''; ?>>No</option>
                        </select>

                        <label for="disability_type_dropdown" id="disability_type_label" style="display: none;">Type of disability:</label>
                        <select id="disability_type_dropdown" name="disability_type_dropdown" style="display: none;">
                            <option value="">Select</option>
                            <option value="physical" <?php echo (isset($_SESSION['disability_type_dropdown']) && $_SESSION['disability_type_dropdown'] == 'physical') ? 'selected' : ''; ?>>Physical Disability</option>
                            <option value="visual" <?php echo (isset($_SESSION['disability_type_dropdown']) && $_SESSION['disability_type_dropdown'] == 'visual') ? 'selected' : ''; ?>>Visual Disability</option>
                            <option value="hearing" <?php echo (isset($_SESSION['disability_type_dropdown']) && $_SESSION['disability_type_dropdown'] == 'hearing') ? 'selected' : ''; ?>>Hearing Disability</option>
                            <option value="intellectual" <?php echo (isset($_SESSION['disability_type_dropdown']) && $_SESSION['disability_type_dropdown'] == 'intellectual') ? 'selected' : ''; ?>>Intellectual Disability</option>
                            <option value="other" <?php echo (isset($_SESSION['disability_type_dropdown']) && $_SESSION['disability_type_dropdown'] == 'other') ? 'selected' : ''; ?>>Other</option>
                        </select>

                        <div class="upload-container">
                            <label class="upload-label" for="disability_image_upload">Upload Disability Image:</label>
                            <input type="file" id="disability_image_upload" name="disability_image_upload" class="upload-input" onchange="previewImage(this)">
                            <span class="upload-preview" id="disabilityImagePreview">
                                <!-- Display uploaded image preview if it exists in the session -->
                                <?php if (isset($_SESSION['uploaded_disability_image'])) : ?>
                                    <img src="uploads/disability/<?php echo $_SESSION['uploaded_disability_image']; ?>" alt="Uploaded Disability Image" class="session-image-preview">
                                    <?php endif; ?>
                                </span>
                            </div>
                        <label class="disabled-label" for="security_deposit_balance_entry">Security Deposit Balance:</label>
                        <input type="text" id="security_deposit_balance_entry" name="security_deposit_balance_entry" value="<?php echo isset($_SESSION['security_deposit_balance_entry']) ? $_SESSION['security_deposit_balance_entry'] : ''; ?>" disabled>

                        <label for="date_of_submission">Date of Submission:</label>
                        <input type="date" id="date_of_submission" name="date_of_submission" value="<?php echo isset($_SESSION['date_of_submission']) ? $_SESSION['date_of_submission'] : ''; ?>">

                    </div>
            </div>
            <button class="submit-button" type="submit">Save and Next</button>

            <div class="contact-info">
        <span>
            <img src="telephone_icon.png" alt="Telephone Icon">
            Help Desk IT Facilitation: 011-23730347
        </span>
        <br>
        <span>
            <img src="telephone_icon.png" alt="Telephone Icon">
            Buying Facilitation Number: 011-23701168
            <br>
    <span class="timing">Hours of Operation (Mon-Fri): 9:30am - 6:00pm</span>
        </span>
    </div>
</body>

        </form>
        <script src="registration.js"></script>
    </div>
</body>

</html>