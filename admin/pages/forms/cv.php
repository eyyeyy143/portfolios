<?php
include_once('../../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileCV'])) {

  if ($_FILES['fileCV']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['fileCV']['tmp_name'];
    $fileName = $_FILES['fileCV']['name'];

 
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    if ($fileExtension === 'pdf') {
      
      $destination = '../../cv/' . $fileName;
      move_uploaded_file($file, $destination);

      
      $sql = "UPDATE cv SET cv_name = '$fileName' WHERE id = 1";
      mysqli_query($con, $sql);

      header("Location: home.php");
      exit();
    } else {
      echo "Only PDF files are allowed.";
    }

  } else {
    echo "Error uploading file.";
  }
}
?>