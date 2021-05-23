<?php
include "../db_conn.php";

if (isset($_POST['upload'])) {
error_reporting(E_ERROR | E_PARSE);
$sigid = $_POST['sigid2'];
$image_loc = $_POST['e_sigloc'];
$temp_loc = "../".$image_loc;
if (file_exists($temp_loc))
 {
   unlink($temp_loc);
}
$target_dir = "../../user/sig/";
$image_loc ="../user/sig/";
$target_file = $target_dir . basename($_FILES["upfile"]["name"]);
$target_file2 = $image_loc . basename($_FILES["upfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
  $check = getimagesize($_FILES["upfile"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo"<script language='javascript'>
    alert('File is not an image');
    window.location.href = '../Admin_signConfig.php';
    </script>
    ";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo"<script language='javascript'>
  alert('File already exists');
  window.location.href = '../Admin_signConfig.php';
  </script>
  ";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["upfile"]["size"] > 500000) {
  echo"<script language='javascript'>
  alert('File is too large');
  window.location.href = '../Admin_signConfig.php';
  </script>
  ";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo"<script language='javascript'>
  alert('Only JPG, JPEG, PNG files are allowed');
  window.location.href = '../Admin_signConfig.php';
  </script>
  ";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo"<script language='javascript'>
  alert('your file was not uploaded');
  window.location.href = '../Admin_signConfig.php';
  </script>
  ";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
    $query = "UPDATE admin SET esignature = '$target_file2' WHERE admin_id = '$sigid'";
    mysqli_query($connection,$query);
    echo"<script language='javascript'>
    alert('The file ". htmlspecialchars( basename( $_FILES["upfile"]["name"])). " has been uploaded');
    window.location.href = '../Admin_signConfig.php';
    </script>
    ";
  } else {
    echo"<script language='javascript'>
    alert('There was an error uploading your file');
    window.location.href = '../Admin_signConfig.php';
    </script>
    ";
  }
}
}
?>
