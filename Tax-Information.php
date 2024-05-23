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
  if (isset($_SESSION['collectorate_entry']) && isset($_SESSION['vendor_type_entry']) && isset($_SESSION['gst_registration_no_entry']) && isset($_SESSION['gst_vendor_type_entry']) && isset($_SESSION['pan_no_entry']) && isset($_SESSION['pan_status_entry']) && isset($_SESSION['pan_reference_no_entry']) && isset($_SESSION['vendor_location_entry']) && isset($_SESSION['aadhar_card_no_entry'])) {
    $updated = false;
    // Compare submitted data with session data and update if necessary
    if ($_POST['collectorate_entry'] != $_SESSION['collectorate_entry']) {
      $_SESSION['collectorate_entry'] = $_POST['collectorate_entry'];
      $updated = true;
    }
    if ($_POST['vendor_type_entry'] != $_SESSION['vendor_type_entry']) {
      $_SESSION['vendor_type_entry'] = $_POST['vendor_type_entry'];
      $updated = true;
    }
    if ($_POST['gst_registration_no_entry'] != $_SESSION['gst_registration_no_entry']) {
      $_SESSION['gst_registration_no_entry'] = $_POST['gst_registration_no_entry'];
      $updated = true;
    }
    if ($_POST['gst_vendor_type_entry'] != $_SESSION['gst_vendor_type_entry']) {
      $_SESSION['gst_vendor_type_entry'] = $_POST['gst_vendor_type_entry'];
      
    if (isset($_POST['passport_details_entry'])) {
      $_SESSION['passport_details_entry'] = $_POST['passport_details_entry'];
        $updated = true;
  
}
    }
    if ($_POST['pan_no_entry'] != $_SESSION['pan_no_entry']) {
      $_SESSION['pan_no_entry'] = $_POST['pan_no_entry'];
      $updated = true;
    }
    if ($_POST['pan_status_entry'] != $_SESSION['pan_status_entry']) {
      $_SESSION['pan_status_entry'] = $_POST['pan_status_entry'];
      $updated = true;
    }
    if ($_POST['pan_reference_no_entry'] != $_SESSION['pan_reference_no_entry']) {
      $_SESSION['pan_reference_no_entry'] = $_POST['pan_reference_no_entry'];
      $updated = true;
    }
    if ($_POST['vendor_location_entry'] != $_SESSION['vendor_location_entry']) {
      $_SESSION['vendor_location_entry'] = $_POST['vendor_location_entry'];
      $updated = true;
    }
    if ($_POST['aadhar_card_no_entry'] != $_SESSION['aadhar_card_no_entry']) {
      $_SESSION['aadhar_card_no_entry'] = $_POST['aadhar_card_no_entry'];
      $updated = true;
    }

    // Display alert if form is updated
    if ($updated) {
      echo "<script>alert('Form has been updated');</script>";
    }
  } else {
    // store form data in session variable
    $_SESSION['collectorate_entry'] = $_POST['collectorate_entry'];
    $_SESSION['vendor_type_entry'] = $_POST['vendor_type_entry'];
    $_SESSION['gst_registration_no_entry'] = $_POST['gst_registration_no_entry'];
    $_SESSION['gst_vendor_type_entry'] = $_POST['gst_vendor_type_entry'];
    $_SESSION['pan_no_entry'] = $_POST['pan_no_entry'];
    $_SESSION['pan_status_entry'] = $_POST['pan_status_entry'];
    $_SESSION['pan_reference_no_entry'] = $_POST['pan_reference_no_entry'];
    $_SESSION['vendor_location_entry'] = $_POST['vendor_location_entry'];
    $_SESSION['aadhar_card_no_entry'] = $_POST['aadhar_card_no_entry'];

    // Display alert
    echo "<script>alert('Form has been saved');</script>";
  }

  // upload the photo of Aadhar card
  if (isset($_FILES["aadhar_card_image_upload"]) && !empty($_FILES["aadhar_card_image_upload"]["tmp_name"])) {
    $targetDir = "uploads/aadhar/";
    $targetFile = $targetDir . basename($_FILES["aadhar_card_image_upload"]["name"]);

    if (move_uploaded_file($_FILES["aadhar_card_image_upload"]["tmp_name"], $targetFile)) {
      $_SESSION['aadhar_card_image'] = basename($_FILES["aadhar_card_image_upload"]["name"]);
    } else {
      echo "Sorry, there was an error uploading your Aadhar card image.";
    }
  }

  // upload the photo of PAN card
  if (isset($_FILES["pan_image_upload"]) && !empty($_FILES["pan_image_upload"]["tmp_name"])) {
    $targetDir = "uploads/pan/";
    $targetFile = $targetDir . basename($_FILES["pan_image_upload"]["name"]);

    if (move_uploaded_file($_FILES["pan_image_upload"]["tmp_name"], $targetFile)) {
        $_SESSION['pan_image'] = basename($_FILES["pan_image_upload"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your PAN card image.";
    }
  }


  // Redirect to next page
  header("Location: CCIC.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tax Information</title>
  <link rel="stylesheet" href="registration.css" />
</head>

<body>
<marquee direction="left" behavior="alternate" 
     style="border: Black 1px solid  "  >The Endover is to Market/promote the Indian Handicrafts and Handlooms.</marquee>
     <div class="nav">
 <img src="login.jpeg" alt="Cottage Image" class="cottage-image">
 <h2 style="text-align: center; padding-left:7%; color:black; text-transform:uppercase; background:radial-gradient(50% 50%, ellipse closest-side, #444, black);"> Welcome to the Enlistment of Craft Person & Artisions of India</h2></div>
  <header>
    <!-- <img src="login.png" alt="Cottage Image" class="cottage-image" /> -->
    <nav>
      <ul>
        <li class="disabled"><a href="General.php">Step 1</a></li>
        <li class="disabled"><a href="Communication.php">step 2</a></li>

        <li class="general disabled"><a href="Tax-Information.php">Step 3</a></li>
        <li class="disabled"><a href="CCIC.php">Step 4</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <div id="tax-information" class="section">
    <h2>Tax Information</h2>
    <form id="tax-information-form-column1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
      <div class="column-container">
        <div class="column">
          <label for="collectorate_entry">Collectorate:</label>
          <input type="text" id="collectorate_entry" name="collectorate_entry" value="<?php echo isset($_SESSION['collectorate_entry']) ? $_SESSION['collectorate_entry'] : ''; ?>" />

          <label for="vendor_type_entry">Vendor Type:</label>
          <input type="text" id="vendor_type_entry" name="vendor_type_entry" value="<?php echo isset($_SESSION['vendor_type_entry']) ? $_SESSION['vendor_type_entry'] : ''; ?>"  />

          <label for="gst_registration_no_entry">GST Registration No:</label>
          <input type="text" id="gst_registration_no_entry" name="gst_registration_no_entry" value="<?php echo isset($_SESSION['gst_registration_no_entry']) ? $_SESSION['gst_registration_no_entry'] : ''; ?>"  />

          <label for="gst_vendor_type_entry">GST Vendor Type:</label>
          <input type="text" id="gst_vendor_type_entry" name="gst_vendor_type_entry" value="<?php echo isset($_SESSION['gst_vendor_type_entry']) ? $_SESSION['gst_vendor_type_entry'] : ''; ?>"  />

          <label for="passport_details_entry">Passport Details:</label>
          <input type="text" id="passport_details_entry" name="passport_details_entry" value="<?php echo isset($_SESSION['passport_details_entry']) ? $_SESSION['passport_details_entry'] : ''; ?>">

        </div>
        <div class="column">
          <label for="pan_no_entry">P.A.N. No:</label>
          <input type="text" id="pan_no_entry" name="pan_no_entry" value="<?php echo isset($_SESSION['pan_no_entry']) ? $_SESSION['pan_no_entry'] : ''; ?>" />

          <label for="pan_status_entry">P.A.N. Status:</label>
          <input type="text" id="pan_status_entry" name="pan_status_entry" value="<?php echo isset($_SESSION['pan_status_entry']) ? $_SESSION['pan_status_entry'] : ''; ?>" />

          <label for="pan_reference_no_entry">P.A.N. Reference No.:</label>
          <input type="text" id="pan_reference_no_entry" name="pan_reference_no_entry" value="<?php echo isset($_SESSION['pan_reference_no_entry']) ? $_SESSION['pan_reference_no_entry'] : ''; ?>" />

          <div class="upload-container">
            <label class="upload-label" for="pan_image_upload">Upload PAN Card Image:</label>
            <input type="file" id="pan_image_upload" name="pan_image_upload" class="upload-input" onchange="previewImage(this)" />
            <span class="upload-preview">
              <!-- Display uploaded image preview if it exists in the session -->
              <?php if (isset($_SESSION['pan_image'])) : ?>
              <img src="uploads/pan/<?php echo $_SESSION['pan_image']; ?>" alt="Uploaded Image" class="session-image-preview">
              <?php endif; ?>
            </span>
          </div>


        </div>
        <div class="column">
          <label for="vendor_location_entry" class="required">Vendor Location:</label>
          <input type="text" id="vendor_location_entry" name="vendor_location_entry" value="<?php echo isset($_SESSION['vendor_location_entry']) ? $_SESSION['vendor_location_entry'] : ''; ?>"  required/>

          <label for="aadhar_card_no_entry">Aadhar Card No.:</label>
          <input type="text" id="aadhar_card_no_entry" name="aadhar_card_no_entry" value="<?php echo isset($_SESSION['aadhar_card_no_entry']) ? $_SESSION['aadhar_card_no_entry'] : ''; ?>"  />

          <div class="upload-container">
            <label class="upload-label" for="aadhar_card_image_upload">Upload Aadhar Card Image:</label>
            <input type="file" id="aadhar_card_image_upload" name="aadhar_card_image_upload" class="upload-input" onchange="previewImage(this)" />
            <span class="upload-preview">
              <!-- Display uploaded image preview if it exists in the session -->
              <?php if (isset($_SESSION['aadhar_card_image'])) : ?>
                <img src="uploads/aadhar/<?php echo $_SESSION['aadhar_card_image']; ?>" alt="Uploaded Image" class="session-image-preview">
              <?php endif; ?>
            </span>
          </div>

        </div>
      </div>
      <div class="button-container">
        <button class="previous-button" type="button" onclick="goBack()">Previous</button>
        <button class="next-button" type="submit">Next</button>

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