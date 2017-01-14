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

$display_name = "";
$save_path = "songs/";

if(isset($_FILES['fileToUpload'])){
    echo "GOT A FILE";
    $errors= array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size =$_FILES['fileToUpload']['size'];
    $file_tmp =$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));

    $expensions= array("mp3","m4a","wav", "aac");

    if(in_array($file_ext,$expensions)=== false){
       $errors[]="extension not allowed, please choose validl mp3, m4a, wav, aac.";
    }

    if(empty($errors)==true){
       $save_path = "songs/" . $file_name;
       move_uploaded_file($file_tmp, $save_path);
       echo "Success";
    }else{
       print_r($errors);
    }
}

if(isset($_REQUEST["submit"])){
    $display_name= $_REQUEST['displayName'];
}

$sql = "INSERT INTO music VALUES ('$display_name', '$save_path')";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
