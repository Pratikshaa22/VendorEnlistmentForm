<?php
session_start();

// Check if the user is not logged in, redirect to the signin page
if (!isset($_SESSION['email'])) {
    header("Location: signin.html");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check if session data exists
    if (
        isset($_SESSION['vendor_categories_entry']) &&
        isset($_SESSION['vendor_credit_limit_entry']) &&
        isset($_SESSION['award_type_entry']) &&
        isset($_SESSION['awardee_entry']) &&
        isset($_SESSION['starting_date_ccic_entry']) &&
        isset($_SESSION['original_state_entry']) &&
        isset($_SESSION['msme_entry']) &&
        isset($_SESSION['msme_type_entry']) &&
        isset($_SESSION['msme_registration_no_entry']) &&
        isset($_SESSION['concessionaire_vendor_entry']) &&
        isset($_SESSION['vendor_commission_entry']) &&
        isset($_SESSION['minority_entry']) &&
        isset($_SESSION['minority_type_entry']) &&
        isset($_SESSION['caste_entry']) &&
        isset($_SESSION['license_fee_entry']) &&
        isset($_SESSION['discount_offered_by_the_vendor_entry'])
    ) {

        $updated = false;
        // Compare submitted data with session data and update if necessary
        if ($_POST['vendor_categories_entry'] != $_SESSION['vendor_categories_entry']) {
            $_SESSION['vendor_categories_entry'] = $_POST['vendor_categories_entry'];
            $updated = true;
        }
        if ($_POST['vendor_credit_limit_entry'] != $_SESSION['vendor_credit_limit_entry']) {
            $_SESSION['vendor_credit_limit_entry'] = $_POST['vendor_credit_limit_entry'];
            $updated = true;
        }
        if ($_POST['award_type_entry'] != $_SESSION['award_type_entry']) {
            $_SESSION['award_type_entry'] = $_POST['award_type_entry'];
            $updated = true;
        }
        if ($_POST['awardee_entry'] != $_SESSION['awardee_entry']) {
            $_SESSION['awardee_entry'] = $_POST['awardee_entry'];
            $updated = true;
        }
        if ($_POST['starting_date_ccic_entry'] != $_SESSION['starting_date_ccic_entry']) {
            $_SESSION['starting_date_ccic_entry'] = $_POST['starting_date_ccic_entry'];
            $updated = true;
        }
        if ($_POST['original_state_entry'] != $_SESSION['original_state_entry']) {
            $_SESSION['original_state_entry'] = $_POST['original_state_entry'];
            $updated = true;
        }
        if ($_POST['msme_entry'] != $_SESSION['msme_entry']) {
            $_SESSION['msme_entry'] = $_POST['msme_entry'];
            $updated = true;
        }
        if ($_POST['msme_type_entry'] != $_SESSION['msme_type_entry']) {
            $_SESSION['msme_type_entry'] = $_POST['msme_type_entry'];
            $updated = true;
        }
        if ($_POST['msme_registration_no_entry'] != $_SESSION['msme_registration_no_entry']) {
            $_SESSION['msme_registration_no_entry'] = $_POST['msme_registration_no_entry'];
            $updated = true;
        }
        if ($_POST['concessionaire_vendor_entry'] != $_SESSION['concessionaire_vendor_entry']) {
            $_SESSION['concessionaire_vendor_entry'] = $_POST['concessionaire_vendor_entry'];
            $updated = true;
        }
        if ($_POST['vendor_commission_entry'] != $_SESSION['vendor_commission_entry']) {
            $_SESSION['vendor_commission_entry'] = $_POST['vendor_commission_entry'];
            $updated = true;
        }
        if ($_POST['minority_entry'] != $_SESSION['minority_entry']) {
            $_SESSION['minority_entry'] = $_POST['minority_entry'];
            $updated = true;
        }
        if ($_POST['minority_type_entry'] != $_SESSION['minority_type_entry']) {
            $_SESSION['minority_type_entry'] = $_POST['minority_type_entry'];
            $updated = true;
        }
        if ($_POST['caste_entry'] != $_SESSION['caste_entry']) {
            $_SESSION['caste_entry'] = $_POST['caste_entry'];
            $updated = true;
        }

        // Upload caste certificate
        if (isset($_FILES["caste_certificate"]) && !empty($_FILES["caste_certificate"]["tmp_name"])) {
            $targetDir = "uploads/caste/";
            $targetFile = $targetDir . basename($_FILES["caste_certificate"]["name"]);
            if (move_uploaded_file($_FILES["caste_certificate"]["tmp_name"], $targetFile)) {
                $_SESSION['caste_certificate'] = basename($_FILES["caste_certificate"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your caste certificate.";
    }
}
        if ($_POST['license_fee_entry'] != $_SESSION['license_fee_entry']) {
            $_SESSION['license_fee_entry'] = $_POST['license_fee_entry'];
            $updated = true;
        }
        if ($_POST['discount_offered_by_the_vendor_entry'] != $_SESSION['discount_offered_by_the_vendor_entry']) {
            $_SESSION['discount_offered_by_the_vendor_entry'] = $_POST['discount_offered_by_the_vendor_entry'];
            $updated = true;
        }

        // Display alert if form is updated
        if ($updated) {
            echo "<script>alert('Form has been updated');</script>";
        }
    } else {
        // store the form data in session variables
        $_SESSION['vendor_categories_entry'] = $_POST['vendor_categories_entry'];
        $_SESSION['vendor_credit_limit_entry'] = $_POST['vendor_credit_limit_entry'];
        $_SESSION['award_type_entry'] = $_POST['award_type_entry'];
        $_SESSION['awardee_entry'] = $_POST['awardee_entry'];
        $_SESSION['starting_date_ccic_entry'] = $_POST['starting_date_ccic_entry'];
        $_SESSION['original_state_entry'] = $_POST['original_state_entry'];
        $_SESSION['msme_entry'] = $_POST['msme_entry'];
        $_SESSION['msme_type_entry'] = $_POST['msme_type_entry'];
        $_SESSION['msme_registration_no_entry'] = $_POST['msme_registration_no_entry'];
        $_SESSION['concessionaire_vendor_entry'] = $_POST['concessionaire_vendor_entry'];
        $_SESSION['vendor_commission_entry'] = $_POST['vendor_commission_entry'];
        $_SESSION['minority_entry'] = $_POST['minority_entry'];
        $_SESSION['minority_type_entry'] = $_POST['minority_type_entry'];
        $_SESSION['caste_entry'] = $_POST['caste_entry'];
        $_SESSION['license_fee_entry'] = $_POST['license_fee_entry'];
        $_SESSION['discount_offered_by_the_vendor_entry'] = $_POST['discount_offered_by_the_vendor_entry'];

        // Display alert
        echo "<script>alert('Form has been saved');</script>";
    }

    // Redirect to preview.php
    header("Location: preview.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCIC</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
<marquee direction="left" behavior="alternate" 
     style="border: Black 1px solid  "  >The Endover is to Market/promote the Indian Handicrafts and Handlooms.</marquee>
     <div class="nav">
 <img src="login.jpeg" alt="Cottage Image" class="cottage-image">
   <h2 style="text-align: center; color:black; text-transform:uppercase; background:radial-gradient(50% 50%, ellipse closest-side, #444, black);"> Welcome to the Enlistment of Craft Person & Artisions of India</h2></div>
    <header>
        <!-- <img src="login.png" alt="Cottage Image" class="cottage-image"> -->
        <nav>
            <ul>
                <li class="disabled"><a href="General.php">Step 1</a></li>
                <li class="disabled"><a href="Communication.php">Step 2</a></li>

                <li class="disabled"><a href="Tax-Information.php">Step 3</a></li>
                <li class="general disabled"><a href="CCIC.php">Step 4</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="ccic" class="section">
        <h2>CCIC</h2>
        <form id="ccic-form-column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="column-container">
                <div class="column">
                    <label for="vendor_categories_entry" class="required">Vendor Categories:</label>
                    <select id="vendor_categories_entry" name="vendor_categories_entry" required>
                        <option value="">Select</option>
                        <optgroup label="A">
                            <option value="artisans" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'artisans') ? 'selected' : ''; ?>>Artisans</option>
                            <option value="craftspersons" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'craftspersons') ? 'selected' : ''; ?>>Craftspersons</option>
                            <option value="weavers" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'weavers') ? 'selected' : ''; ?>>Weavers</option>
                            <option value="potters" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'potters') ? 'selected' : ''; ?>>Potters</option>
                            <option value="sculptors" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'sculptors') ? 'selected' : ''; ?>>Sculptors</option>
                        </optgroup>
                        <optgroup label="B">
                            <option value="cooperative" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'cooperative') ? 'selected' : ''; ?>>Cooperative</option>
                            <option value="society" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'society') ? 'selected' : ''; ?>>Society</option>
                            <option value="ngo" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'ngo') ? 'selected' : ''; ?>>NGO</option>
                            <option value="state" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'state') ? 'selected' : ''; ?>>State</option>
                            <option value="govt" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'govt') ? 'selected' : ''; ?>>Govt.</option>
                            <option value="psu" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'psu') ? 'selected' : ''; ?>>PSU</option>
                        </optgroup>
                        <optgroup label="C">
                            <option value="Manufactures" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'manufactures') ? 'selected' : ''; ?>>Manufactures</option>
                        </optgroup>
                        <optgroup label="D">
                            <option value="Traders" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'Traders') ? 'selected' : ''; ?>>Traders</option>
                        </optgroup>
                        <optgroup label="E">
                            <option value="Clusters" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'Clusters') ? 'selected' : ''; ?>>Clusters</option> 
                            <option value="Member of Cluster Group" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'member of cluster group') ? 'selected' : ''; ?>>Member Of Cluster Group</option>
                        </optgroup>
                        <optgroup label="F">
                            <option value="CFC-Varanasi" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'CFC-Varanasi') ? 'selected' : ''; ?>>CFC-Varanasi</option>
                        </optgroup>
                        <optgroup label="G">
                            <option value="others" <?php echo (isset($_SESSION['vendor_categories_entry']) && $_SESSION['vendor_categories_entry'] == 'others') ? 'selected' : ''; ?>>Others</option>
                        </optgroup>
                    </select>

                    <label for="vendor_credit_limit_entry">Vendor Credit Limit:</label>
                    <input type="text" id="vendor_credit_limit_entry" name="vendor_credit_limit_entry" value="<?php echo isset($_SESSION['vendor_credit_limit_entry']) ? $_SESSION['vendor_credit_limit_entry'] : ''; ?>">

                    <label for="award_type_entry">Award Type:</label>
                    <select id="award_type_entry" name="award_type_entry">
                        <option value="">Select</option>
                        <option value="National Awardee" <?php echo (isset($_SESSION['award_type_entry']) && $_SESSION['award_type_entry'] == 'National Awardee') ? 'selected' : ''; ?>>National Awardee</option>
                        <option value="State Awardee" <?php echo (isset($_SESSION['award_type_entry']) && $_SESSION['award_type_entry'] == 'State Awardee') ? 'selected' : ''; ?>>State Awardee</option>
                        <option value="ShilpGuru" <?php echo (isset($_SESSION['award_type_entry']) && $_SESSION['award_type_entry'] == 'ShilpGuru') ? 'selected' : ''; ?>>ShilpGuru</option>
                        <option value="Sant Kabir" <?php echo (isset($_SESSION['award_type_entry']) && $_SESSION['award_type_entry'] == 'Sant Kabir') ? 'selected' : ''; ?>>Sant Kabir</option>
                        <option value="Others" <?php echo (isset($_SESSION['award_type_entry']) && $_SESSION['award_type_entry'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                    </select>

                    <label for="awardee_entry">Awardee:</label>
                    <input type="text" id="awardee_entry" name="awardee_entry" value="<?php echo isset($_SESSION['awardee_entry']) ? $_SESSION['awardee_entry'] : ''; ?>">

                    <label for="starting_date_ccic_entry">Approval Date of CCIC:</label>
                    <input type="date" id="starting_date_ccic_entry" name="starting_date_ccic_entry" value="<?php echo isset($_SESSION['starting_date_ccic_entry']) ? $_SESSION['starting_date_ccic_entry'] : ''; ?>">

                    <label for="original_state_entry">Original State:</label>
                    <input type="text" id="original_state_entry" name="original_state_entry" value="<?php echo isset($_SESSION['original_state_entry']) ? $_SESSION['original_state_entry'] : ''; ?>">

                    <label for="msme_entry">MS/ME:</label>
                    <input type="text" id="msme_entry" name="msme_entry" value="<?php echo isset($_SESSION['msme_entry']) ? $_SESSION['msme_entry'] : ''; ?>">

                    <label for="msme_type_entry">MS/ME Type:</label>
                    <select id="msme_type_entry" name="msme_type_entry">
                        <option value="">Select</option>
                        <option value="DICS" <?php echo (isset($_SESSION['msme_type_entry']) && $_SESSION['msme_type_entry'] == 'DICS') ? 'selected' : ''; ?>>DICS</option>
                        <option value="KVIC" <?php echo (isset($_SESSION['msme_type_entry']) && $_SESSION['msme_type_entry'] == 'KVIC') ? 'selected' : ''; ?>>KVIC</option>
                        <option value="KVIB" <?php echo (isset($_SESSION['msme_type_entry']) && $_SESSION['msme_type_entry'] == 'KVIB') ? 'selected' : ''; ?>>KVIB</option>
                        <option value="DHC" <?php echo (isset($_SESSION['msme_type_entry']) && $_SESSION['msme_type_entry'] == 'DHC') ? 'selected' : ''; ?>>DHC</option>
                        <option value="DHL" <?php echo (isset($_SESSION['msme_type_entry']) && $_SESSION['msme_type_entry'] == 'KVIC') ? 'selected' : ''; ?>>DHL</option>
                        <option value="MOMSME" <?php echo (isset($_SESSION['msme_type_entry']) && $_SESSION['msme_type_entry'] == 'MOMSME') ? 'selected' : ''; ?>>MOMSME</option>
                        <option value="UAM" <?php echo (isset($_SESSION['msme_type_entry']) && $_SESSION['msme_type_entry'] == 'UAM') ? 'selected' : ''; ?>>UAM</option>            
                    </select>

                    <label for="msme_registration_no_entry">MS/ME Registration No.:</label>
                    <input type="text" id="msme_registration_no_entry" name="msme_registration_no_entry" value="<?php echo isset($_SESSION['msme_registration_no_entry']) ? $_SESSION['msme_registration_no_entry'] : ''; ?>">

                    <label for="discount_offered_by_the_vendor_entry">Discount Offered by Vendor:</label>
                    <input type="text" id="discount_offered_by_the_vendor_entry" name="discount_offered_by_the_vendor_entry" value="<?php echo isset($_SESSION['discount_offered_by_the_vendor_entry']) ? $_SESSION['discount_offered_by_the_vendor_entry'] : ''; ?>">
                </div>
                <div class="column">
                    <label for="concessionaire_vendor_entry">Concessionaire Vendor:</label>
                    <input type="text" id="concessionaire_vendor_entry" name="concessionaire_vendor_entry" value="<?php echo isset($_SESSION['concessionaire_vendor_entry']) ? $_SESSION['concessionaire_vendor_entry'] : ''; ?>">

                    <label for="vendor_commission_entry" class="disabled-label">Vendor Commission %:</label>
                    <input type="text" id="vendor_commission_entry" name="vendor_commission_entry" value="<?php echo isset($_SESSION['vendor_commission_entry']) ? $_SESSION['vendor_commission_entry'] : ''; ?>"disabled>

                    <label for="minority_entry">Minority:</label>
                    <select id="minority_entry" name="minority_entry" onchange="toggleMinorityType()">
                        <option value="">Select</option>
                        <option value="Yes" <?php echo (isset($_SESSION['minority_entry']) && $_SESSION['minority_entry'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                        <option value="No" <?php echo (isset($_SESSION['minority_entry']) && $_SESSION['minority_entry'] == 'No') ? 'selected' : ''; ?>>No</option>
                    </select>

                    <label for="minority_type_entry" id="minority_type_label" style="display: none;">Minority Type:</label>
                    <select id="minority_type_entry" name="minority_type_entry" style="display: none;">
                        <option value="">Select</option>
                        <option value="Hindu" <?php echo (isset($_SESSION['minority_type_entry']) && $_SESSION['minority_type_entry'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                        <option value="Muslim" <?php echo (isset($_SESSION['minority_type_entry']) && $_SESSION['minority_type_entry'] == 'Muslim') ? 'selected' : ''; ?>>Muslim</option>
                        <option value="Sikh" <?php echo (isset($_SESSION['minority_type_entry']) && $_SESSION['minority_type_entry'] == 'Sikh') ? 'selected' : ''; ?>>Sikh</option>
                        <option value="Budhist" <?php echo (isset($_SESSION['minority_type_entry']) && $_SESSION['minority_type_entry'] == 'Budhist') ? 'selected' : ''; ?>>Budhist</option>
                        <option value="Parsi" <?php echo (isset($_SESSION['minority_type_entry']) && $_SESSION['minority_type_entry'] == 'parsi') ? 'selected' : ''; ?>>Parsi</option>
                        <option value="Christian" <?php echo (isset($_SESSION['minority_type_entry']) && $_SESSION['minority_type_entry'] == 'christian') ? 'selected' : ''; ?>>Christian</option>
                        <option value="Others" <?php echo (isset($_SESSION['minority_type_entry']) && $_SESSION['minority_type_entry'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                        
                    </select>

                    <label for="caste_entry">Caste:</label>
                    <select id="caste_entry" name="caste_entry">
                        <option value="">Select</option>
                        <option value="General" <?php echo (isset($_SESSION['caste_entry']) && $_SESSION['caste_entry'] == 'General') ? 'selected' : ''; ?>>General</option>
                        <option value="OBC" <?php echo (isset($_SESSION['caste_entry']) && $_SESSION['caste_entry'] == 'OBC') ? 'selected' : ''; ?>>OBC</option>
                        <option value="ST/SC" <?php echo (isset($_SESSION['caste_entry']) && $_SESSION['caste_entry'] == 'ST/SC') ? 'selected' : ''; ?>>SC/ST</option>                       
                    </select>

                    <div class="upload-container">
                        <label class="upload-label" for="caste_certificate">Upload Caste Certificate:</label>
                        <input type="file" id="caste_certificate" name="caste_certificate" class="upload-input" onchange="previewCasteCertificate(this)" />
                        <span class="upload-preview">
                            <!-- Display uploaded caste certificate preview if it exists in the session -->
                        <?php if (isset($_SESSION['caste_certificate'])) : ?>
                            <img src="uploads/caste/<?php echo $_SESSION['caste_certificate']; ?>" alt="Uploaded Caste Certificate" class="session-image-preview">
                        <?php endif; ?>
                        </span>
                    </div>

                    <label for="license_fee_entry">License Fee %:</label>
                    <input type="text" id="license_fee_entry" name="license_fee_entry" value="<?php echo isset($_SESSION['license_fee_entry']) ? $_SESSION['license_fee_entry'] : ''; ?>">

                </div>
            </div>
            <div class="button-container">
                <button class="previous-button" type="button" onclick="goBack()">Previous</button>
                <button class="next-button" type="submit">Submit</button>
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
            </div>

        </form>
    </div>
    </div>
    </div>
    <script src="registration.js"></script>
</body>

</html>