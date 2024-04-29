
<?php
include_once('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $company = $_POST['company'];
    $address = $_POST['address'];
    $job = $_POST['job'];
    $des = $_POST['des'];
    $startyear = $_POST['startyear'];
    $endyear = $_POST['endyear'];


    $stmt = $con->prepare("INSERT INTO experience (company_name,company_address, job_title,job_description, start_year, end_year) VALUES (?,?,?, ?,?, ?)");
    $stmt->bind_param("ssssii", $company,$address, $job,$des,$startyear, $endyear);
    $stmt->execute();

  
    header("Location: portfolio.php");
    exit();
}
?>