
<?php
include_once('../../config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileImg'])) {

    if ($_FILES['fileImg']['error'] === UPLOAD_ERR_OK) {
      
      $file = $_FILES['fileImg']['tmp_name'];
      $fileName = $_FILES['fileImg']['name'];
      $name = $_POST['name'];
        $description = $_POST['description'];
        $link = $_POST['link'];
      
     
      $destination = '../../img/' . $fileName;
      move_uploaded_file($file, $destination);
  

      $stmt = $con->prepare("INSERT INTO projects (title, picture, description, link) VALUES (?, ?,?,?)");
      $stmt->bind_param("ssss", $name, $fileName,$description, $link);
      $stmt->execute();
  

      header("Location: about.php");
      exit();
  
    } else {
   
    }
  }
?>