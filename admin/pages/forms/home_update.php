<?php
include_once('../../config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $des = $_POST['des'];
    $display_name = $_POST['display_name'];
    $display_skill_1 = $_POST['display_skill_1'];
    $descriptions = $_POST['descriptions'];
    $user_id = 1;

 
    $stmt = $con->prepare("UPDATE displaycontent SET name=?, des=?, display_name=?, display_skill_1=?, descriptions=? WHERE id=?");
    $stmt->bind_param("sssssi", $name,$des,$display_name, $display_skill_1, $descriptions, $user_id);
    $stmt->execute();

    $_SESSION['status'] = "UPDATED  SUCCESSFULLY";
    $_SESSION['status_code'] = "success"; 
    header("Location: home.php");
    
}
?>