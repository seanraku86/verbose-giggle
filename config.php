<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['email'])){
    $user_email = $_POST['email'];
    
// Connect to the database
$conn = mysqli_connect('awseb-e-dprzrcxnyr-stack-awsebrdsdatabase-au0tj7uj8ivo.cqtue1fekog7.us-east-1.rds.amazonaws.com', 'JenWeiLoAssg2', '14347367', 'assignment2') or die(mysqli_error($conn));

// Check if the email is already in the database
$query1 = "SELECT * FROM renting_history WHERE user_email = '$user_email'";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) == 0) {
  $updated_total = $totalPrice + 200;
} else {
  $updated_total = $totalPrice;
}

// Insert the order into the database
date_default_timezone_set("Australia/Sydney");
$dateToday = date("m-d-Y");
$user_name = $_POST['fname'];
$user_email = $_POST['email'];
$bond_amount = 0;
echo 'Thank you for the order. The total amount is: A$' . $updated_total . '<br>';

$query2 = "INSERT INTO renting_history (user_name, user_email, rent_date, bond_amount) VALUES ('$user_name', '$user_email', '$dateToday', $bond_amount)";
$result2 = mysqli_query($conn, $query2);

mysqli_close($conn);

}

?>



