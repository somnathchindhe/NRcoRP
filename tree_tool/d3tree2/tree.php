<?php
//database connection

$servername = "localhost";
$username = "somnath";
$password = "abimt39";
$dbname = "peactise_work ";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = SELECT * FROM `tree_tool_raw_data_dummy___sheet1` ;
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

echo json_encode($data);
?>
ini_set('display_errors', 1);
error_reporting(E_ALL);
