<?php
include_once('../../config.php');


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
 
    $sql = "DELETE FROM about WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        
        header("Location: portfolio.php");
        exit();
    } else {
        echo "Error deleting message: " . $con->error;
    }
} else {
    echo "Invalid id parameter";
}
?>