<?php
$servername = "localhost";
$username = "dan";
$password = "hello";
$dbname = "mlooper";
$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

// $display_name = strval($_POST['songsList']);
$sql_query = mysqli_query($conn, "SELECT file_path FROM music ORDER BY listOrder DESC LIMIT 1");
$query_row = mysqli_fetch_assoc($sql_query);
$file = $query_row["file_path"];


if(file_exists($file)){
    header('Content-type: {$mime_type}');
    header('Content-length: ' . filesize($file));
    // header('Content-Disposition: filename="' . $filename);
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');
    readfile($file);
}else{
    header("HTTP/1.0 404 Not Found");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
