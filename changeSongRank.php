<?php
$servername = "localhost";
$username = "dan";
$password = "hello";
$dbname = "mlooper";

$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
$display_name = "";
if(isset($_POST["songsList"])){
  $display_name = $_POST["songsList"];
}
echo $display_name;

$largest_order = mysqli_query($conn, "SELECT MAX(listOrder) FROM music");
$larg_order_row = mysqli_fetch_row($largest_order);
$largest = $larg_order_row[0];
echo $largest;

$old_max_name_query = mysqli_query($conn, "SELECT name FROM music WHERE listOrder = '$largest'");
$old_max_name_row = mysqli_fetch_row($old_max_name_query);
$old_max_name = $old_max_name_row[0];
echo $old_max_name;

$currentID_query = mysqli_query($conn, "SELECT listOrder FROM music WHERE name = '$display_name' LIMIT 1");
$currentID_row = mysqli_fetch_row($currentID_query);
$currentID = $currentID_row[0];
echo $currentID;


$sql1 = "UPDATE music SET listOrder = '$largest' WHERE name = '$display_name'";
$conn->query($sql1);

$sql2= "UPDATE music SET listOrder = '$currentID' WHERE name = '$old_max_name'";
$conn->query($sql2);

$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
