<?php
$servername = "localhost";
$username = "dan";
$password = "hello";
$dbname = "mlooper";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
echo "<select name='songs'>";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//query
$sql_query = mysqli_query($conn, "SELECT name FROM music");

while($row = $sql_query->fetch_assoc()){
  echo "<option value=\"owner1\">" . $row['name'] . "</option>";
}
array_pop($array);
print_r($array);
echo "</select>";
?>
