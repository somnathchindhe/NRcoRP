<?php
$servername = "localhost";  // Replace with your server name
$username = "somnath";         // Replace with your username
$password = "abimt@39";             // Replace with your password (if any)
$dbname = "NRPTM";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample query
$sql = "SELECT * FROM `tree_practice___sheet1";  // Replace with your query

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Process each row
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "No results found";
}

$conn->close();  // Close the connection
?>
