
<?php
include_once('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $skillname = $_POST['skillname'];
    $skillper = $_POST['skillper'];
   


 
    $stmt = $con->prepare("INSERT INTO about (skillname, skillper) VALUES (?, ?)");
    $stmt->bind_param("si", $skillname, $skillper);
    $stmt->execute();

  
    header("Location: portfolio.php");
    exit();
}
?>