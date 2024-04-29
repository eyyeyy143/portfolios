<?php
include_once('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = $_POST['email'];
    $mobile_num = $_POST['num'];
    $address = $_POST['address'];
    $user_id = 1; 


    $stmt = $con->prepare("UPDATE contact SET email=?, mobile_num=?, address=? WHERE id=?");
    $stmt->bind_param("sssi", $email, $mobile_num, $address, $user_id);
    $stmt->execute();

    
    header("Location: contact.php");
    exit();
}
?>