<?php
$servername = "localhost";
$username = "dan";
$password = "hello";
$dbname = "mlooper";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = "";
$last_name = "";

if(isset($_REQUEST["submit"])){
    $first_name = $_REQUEST['firstname'];
    $last_name = $_REQUEST['lastname'];
}

$sql = "INSERT INTO music VALUES ('$first_name', '$last_name')";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
