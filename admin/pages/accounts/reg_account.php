<?php

include_once('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
    $sql = "INSERT INTO users (user_name, password)
            VALUES ('$user_name',  '$hashed_password')";

    
     if ($con->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Record added successfully";
        header("Location: ../../index.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>