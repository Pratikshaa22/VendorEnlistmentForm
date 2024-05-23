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
  if (isset($_SESSION['phone_no_entry']) && isset($_SESSION['fax_no_entry']) && isset($_SESSION['email_entry']) && isset($_SESSION['department_dropdown']) && isset($_SESSION['product_name_entry']) && isset($_SESSION['material_used_entry']) && isset($_SESSION['product_source_entry'])) {

    $updated = false;
    // Compare submitted data with session data and update if necessary
    if ($_POST['phone_no_entry'] != $_SESSION['phone_no_entry']) {
      $_SESSION['phone_no_entry'] = $_POST['phone_no_entry'];
      $updated = true;
    }
    if ($_POST['fax_no_entry'] != $_SESSION['fax_no_entry']) {
      $_SESSION['fax_no_entry'] = $_POST['fax_no_entry'];
      $updated = true;
    }
    if ($_POST['email_entry'] != $_SESSION['email_entry']) {
      $_SESSION['email_entry'] = $_POST['email_entry'];
      $updated = true;
    }
    if ($_POST['department_dropdown'] != $_SESSION['department_dropdown']) {
      $_SESSION['department_dropdown'] = $_POST['department_dropdown'];
      $updated = true;
    }
    if ($_POST['product_name_entry'] != $_SESSION['product_name_entry']) {
      $_SESSION['product_name_entry'] = $_POST['product_name_entry'];
      $updated = true;
    }
    if ($_POST['material_used_entry'] != $_SESSION['material_used_entry']) {
      $_SESSION['material_used_entry'] = $_POST['material_used_entry'];
      $updated = true;
    }
    if ($_POST['product_source_entry'] != $_SESSION['product_source_entry']) {
      $_SESSION['product_source_entry'] = $_POST['product_source_entry'];
      $updated = true;
    }

    // Display alert if form is updated
    if ($updated) {
      echo "<script>alert('Form has been updated');</script>";
    }
  } else {
    // If session data doesn't exist, initialize it
    $_SESSION['phone_no_entry'] = $_POST['phone_no_entry'];
    $_SESSION['fax_no_entry'] = $_POST['fax_no_entry'];
    $_SESSION['email_entry'] = $_POST['email_entry'];
    $_SESSION['department_dropdown'] = $_POST['department_dropdown'];
    $_SESSION['product_name_entry'] = $_POST['product_name_entry'];
    $_SESSION['material_used_entry'] = $_POST['material_used_entry'];
    $_SESSION['product_source_entry'] = $_POST['product_source_entry'];

    // Display alert
    echo "<script>alert('Form has been saved');</script>";
  }

  // upload the photo of product
  if (isset($_FILES["product_image_upload"]) && !empty($_FILES["product_image_upload"]["tmp_name"])) {

    // Check image using getimagesize function and get size
    // if a valid number is got then uploaded file is an image
    $check = getimagesize($_FILES["product_image_upload"]["tmp_name"]);
    if ($check !== false) {
      // directory name to store the uploaded image files
      // this should have sufficient read/write/execute permissions
      // if not already exists, please create it in the root of the
      // project folder
      $targetDir = "uploads/product/";
      $targetFile = $targetDir . basename($_FILES["product_image_upload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

      // Remove previously uploaded image if exists
      if (isset($_SESSION['uploaded_image'])) {
        $prevImageFile = $targetDir . $_SESSION['uploaded_image'];
        if (file_exists($prevImageFile)) {
          unlink($prevImageFile);
        }
      }

      // Move uploaded file to the specified directory
      if (move_uploaded_file($_FILES["product_image_upload"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["product_image_upload"]["name"]) . " has been uploaded.";

        // Store the uploaded image filename in a session variable
        $_SESSION['uploaded_image'] = $_FILES["product_image_upload"]["name"];
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Redirect to next page
  header("Location: Tax-Information.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Communication</title>
  <link rel="stylesheet" href="registration.css" />
  <script>
    function redirectToAnotherPage(page) {
      window.location.href = page;
    }
  </script>

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
        <li><a href="General.php">Step 1</a></li>
        <li><a href="Communication.php">Step 2</a></li>
        <li><a href="Tax-Information.php">Step 3</a></li>
        <li><a href="CCIC.php">Step 4</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <div id="communication" class="section">
    <h2>Communication</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="communication-form" enctype="multipart/form-data">
      <div class="column-container">

        <div class="column">
          <label for="fax_no_entry">Fax No.:</label>
          <input type="text" id="fax_no_entry" name="fax_no_entry" value="<?php echo isset($_SESSION['fax_no_entry']) ? $_SESSION['fax_no_entry'] : ''; ?>">

          <label for="email_entry" class="required">Email:</label>
          <input type="text" id="email_entry" name="email_entry" value="<?php echo isset($_SESSION['email_entry']) ? $_SESSION['email_entry'] : ''; ?>" required>

          <label for="department_dropdown" class="required">Department:</label>
          <select id="department_dropdown" name="department_dropdown" required>
            <option value="">Select</option>
            <option value="SHAWL" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'SHAWL') ? 'selected' : ''; ?>>Shawl</option>
            <option value="Toys" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Toys') ? 'selected' : ''; ?>>Toys</option>
            <option value="Concessoinare" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Concessoinare') ? 'selected' : ''; ?>>Concessoinare</option>
            <option value="Accessories" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Accessories') ? 'selected' : ''; ?>>Accessories</option>
            <option value="Mens Wear" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Mens Wear') ? 'selected' : ''; ?>>Mens Wear</option>
            <option value="Women" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Women') ? 'selected' : ''; ?>>Women</option>
            <option value="Brass" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Brass') ? 'selected' : ''; ?>>Brass</option>
            <option value="Craft" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Craft') ? 'selected' : ''; ?>>Craft</option>
            <option value="Furnising" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Furnising') ? 'selected' : ''; ?>>Furnising</option>
            <option value="Jewellery" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Jewellery') ? 'selected' : ''; ?>>Jewellery</option>
            <option value="Bed Spread" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Bed Spread') ? 'selected' : ''; ?>>Bed Spread</option>
            <option value="Table Linen" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Table Linen') ? 'selected' : ''; ?>>Table Linen</option>
            <option value="Dress Fabric" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Dress Fabric') ? 'selected' : ''; ?>>Dress Fabric</option>
            <option value="Pottery" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Pottery') ? 'selected' : ''; ?>>Pottery</option>
            <option value="Children's Wear" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Children\'s Wear') ? 'selected' : ''; ?>>Children's Wear</option>
            <option value="Misc Item" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Misc Item') ? 'selected' : ''; ?>>Misc Item</option>
            <option value="Sales Promo Item" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Sales Promo Item') ? 'selected' : ''; ?>>Sales Promo Item</option>
            <option value="Carpets" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Carpets') ? 'selected' : ''; ?>>Carpets</option>
            <option value="Sarees" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Sarees') ? 'selected' : ''; ?>>Sarees</option>
            <option value="Art Object" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Art Object') ? 'selected' : ''; ?>>Art Object</option>
            <option value="Painting" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Painting') ? 'selected' : ''; ?>>Painting</option>
            <option value="Jute" <?php echo (isset($_SESSION['department_dropdown']) && $_SESSION['department_dropdown'] == 'Jute') ? 'selected' : ''; ?>>Jute</option>
          </select>
        </div>
        

        <div class="column">
          <label for="product_name_entry" class="requiresd">Product Name:</label>
          <input type="text" id="product_name_entry" name="product_name_entry" value="<?php echo isset($_SESSION['product_name_entry']) ? $_SESSION['product_name_entry'] : ''; ?>">

          <label for="material_used_entry">Material Used:</label>
          <input type="text" id="material_used_entry" name="material_used_entry" value="<?php echo isset($_SESSION['material_used_entry']) ? $_SESSION['material_used_entry'] : ''; ?>">

          <label for="product_source_entry">Source of Product:</label>
          <input type="text" id="product_source_entry" name="product_source_entry" value="<?php echo isset($_SESSION['product_source_entry']) ? $_SESSION['product_source_entry'] : ''; ?>">

          <div class="upload-container">
            <label class="upload-label" for="product_image_upload">Upload Product Image:</label>
            <input type="file" id="product_image_upload" name="product_image_upload" class="upload-input" onchange="previewImage(this)">
            <span class="upload-preview" id="imagePreview">
              <!-- Display uploaded image preview if it exists in the session -->
              <?php if (isset($_SESSION['uploaded_image'])) : ?>
                <img src="uploads/product/<?php echo $_SESSION['uploaded_image']; ?>" alt="Uploaded Image" class="session-image-preview">
              <?php endif; 
              ?>
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
  <script src="registration.js"></script>
</body>

</html>