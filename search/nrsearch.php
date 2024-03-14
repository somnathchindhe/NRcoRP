<?php
$servername = "localhost";
$username = "somnath";
$password = "abimt39";
$dbname = "NRPTM";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get query text from HTML using Post
if (isset($_POST['inputData'])) { // Added single quotes around 'inputData'
    $nrvalue = $_POST['inputData']; // Added $ symbol before nrvalue
}

// SQL query
$sql = "SELECT Uniport_of_NR, SITE_OF_PTM, PTM FROM `sample_main1` WHERE Uniport_of_NR = '$nrvalue' OR Gene = '$nrvalue' OR NRNC_symbol = '$nrvalue' ORDER BY `sample_main1`.`Uniport_of_NR` ASC"; // Enclosed $nrvalue within single quotes

echo "<style>
    /* Table styling */
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    /* ... rest of your CSS ... */

    /* Message styling */
    .no-result {
        color: #ff0000;
        font-weight: bold;
    }
</style>";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<table border='1'>
    <tr>
        <th>Uniport_of_NR</th>
        <th>SITE_OF_PTM</th>
        <th>PTM</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)) { // Changed $result->fetch_assoc() to mysqli_fetch_assoc($result)
     echo "<tr>
            <td>" . $row["Uniport_of_NR"] . "</td>
            <td>" . $row["SITE_OF_PTM"] . "</td>
            <td>" . $row["PTM"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No result found for $nrvalue";
}

mysqli_close($conn);
?>


