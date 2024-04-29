
<?php
include_once('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $edu = $_POST['edu'];
    $school = $_POST['school'];
    $course = $_POST['course'];
    $startyear = $_POST['startyear'];
    $endyear = $_POST['endyear'];


   
    $stmt = $con->prepare("INSERT INTO education (edu,school, course, startyear, endyear) VALUES (?,?, ?,?, ?)");
    $stmt->bind_param("sssii", $edu, $school,$course,$startyear, $endyear);
    $stmt->execute();


    header("Location: portfolio.php");
    exit();
}
?>