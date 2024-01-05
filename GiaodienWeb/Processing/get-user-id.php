<?php
$con = mysqli_connect("localhost","root","","bangiay");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();
$response = array();

if (isset($_SESSION['user_id'])) {
    $response['user_id'] = $_SESSION['user_id'];
} else {
    $response['user_id'] = null;
}

header('Content-Type: application/json');
echo json_encode($response);
?>


