
<?php
include_once('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $logo = $_POST['logo'];
    $link = $_POST['link'];

    
    $stmt = $con->prepare("INSERT INTO socialmedia (logo, link) VALUES (?, ?)");
    $stmt->bind_param("ss", $logo, $link);
    $stmt->execute();

    
    header("Location: contact.php");
    exit();
}
?>