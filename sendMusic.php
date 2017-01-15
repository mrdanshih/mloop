<?php
$servername = "localhost";
$username = "dan";
$password = "hello";
$dbname = "mlooper";

$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

$display_name = $_GET["songs_list"];

$sql_query = mysqli_query($conn, "SELECT file_path FROM music WHERE name = 'Paris' limit 1");
$query_row = mysqli_fetch_assoc($sql_query);
$file = $query_row["file_path"];

// $dir = "songs";
// $filename = "paris.mp3";
// $file = $dir."/".$filename;

$extension = "mp3";
$mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";

$file = "songs/Stone.m4a";

if(file_exists($file)){

    header('Content-type: {$mime_type}');
    header('Content-length: ' . filesize($file));
    header('Content-Disposition: filename="' . $filename);
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');
    readfile($file);
}else{
    header("HTTP/1.0 404 Not Found");
}

?>
