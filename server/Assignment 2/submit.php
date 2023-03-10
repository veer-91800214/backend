<!-- SERVER SIDE CODE -->
<html>

<head>
  <title>Assgnment 2</title>
  <link rel="stylesheet" href="../stylesheet/style.css">
</head>

<?php
include("../class/person.php");
include("../class/features.php");
// Defining globals
$user = new person($_POST['fname'], $_POST['lname']);
$feature = new features();
$fNameErr = $lNameErr = "";
$imageerr = "";
// Check if server request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the FirstName is empty.
  if (empty($user->getFName())) {
    echo '<body style="background-color:#ff540069;color:Red">';
    $fNameErr = "<br>First Name required";
  }
  // Check if name only contains letters and whitespace
  elseif (!$feature->onlyAlpha($user->getFName())) {
    echo '<body style="background-color:#ff540069;color:Red">';
    $fNameErr = "<br>First Name Not contains only alphabets";
  }
  // Check if the LastName is empty.
  if (empty($user->getLName())) {
    echo '<body style="background-color:#ff540069;color:Red">';
    $lNameErr = "<br>Last Name required";
  }
  // Check if name only contains letters and whitespace
  elseif (!$feature->onlyAlpha($user->getLName())) {
    echo '<body style="background-color:#ff540069;color:Red">';
    $lNameErr = "<br>Last Name Not contains only alphabets";
  }
}
?>

<!-- Image upload script -->
<?php
// If image field is not empty show the provided image
if (!empty($_FILES['pic']['name'])) {
  $file_name = $_FILES['pic']["name"];
  $file_size = $_FILES['pic']["size"];
  $file_temp = $_FILES['pic']["tmp_name"];
  $file_type = $_FILES['pic']["type"];
  move_uploaded_file($file_temp, "../uploaded_Images/" . $file_name);
}
// If image field is empty then show the default image
else
  $file_name = "default.png";
?>

<body>
  <!-- Details field that holds the Profile-pic and welcome text -->
  <div class="details">
    <!-- ID field only holds Profile-pic and fullname -->
    <div class="ID">
      <?php
      if (!empty($_FILES['pic']['name']) && $fNameErr === "" && $lNameErr === "") {
        if ($feature->validImage($file_size, $file_type)) {
          echo '<div class="profile-pic">';
          echo '<img src="../uploaded_Images/' . $file_name . '">';
          echo '</div>';
          echo '<h4 class="fullname">';
          echo $user->getFullName();
          echo '</h4>';
        } else
          echo "<br>Image not valid";
      } else {
        echo '<div class="profile-pic">';
        echo '<img src="../uploaded_Images/default.png">';
        echo '</div>';
      }
      ?>

    </div>
    <!-- this field only contains the welcome texts or errors -->
    <div class=" fd-col">
      <span class="banner-text">
        <?php
        if ($fNameErr === "" && $lNameErr === "") {
          echo "Welcome &nbsp" . $_POST["fname"] .
            "<h5> FORM SUCCESSFULLY SUBMITTED </h4><br>";
        } else {
          echo "error:";
          echo $fNameErr;
          echo $lNameErr;
        }
        ?>
      </span>
    </div>
  </div>
</body>

</html>