<?php
// database cponnction
$servername = "localhost";
$username = "somnath";
$password = "abimt39";
$dbname = "NRPTM";


// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve hierarchical data
$query = "SELECT * FROM tree_table";
$result = $conn->query($query);

// Organize data hierarchically
$hierarchicalData = [];
while ($row = $result->fetch_assoc()) {
    $type = $row['TYPE'];
    $receptor = $row['Receptor'];
    $isoform = $row['Receptor_isoform'];

    if (!isset($hierarchicalData[$type])) {
        $hierarchicalData[$type] = [];
    }
    if (!isset($hierarchicalData[$type][$receptor])) {
        $hierarchicalData[$type][$receptor] = [];
    }
    $hierarchicalData[$type][$receptor][] = $isoform;
}

// Convert to JSON and format it for display
$jsonData = json_encode($hierarchicalData, JSON_PRETTY_PRINT);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div id="tree-container"></div>
  <pre id="json-output"><?php echo $jsonData; ?></pre>
  <script>
    // ... D3.js code to create tree visualization ...
  </script>
</body>
</html>
