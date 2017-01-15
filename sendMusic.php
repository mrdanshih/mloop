<?php
//$filename = $_GET['Fire.mp3'];
if(isset($_REQUEST["submit"])){
    $display_name= $_REQUEST['displayName'];
}

$file = "songs/Fire.mp3";
$extension = "mp3";
$mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";
readfile($file);
if(file_exists("songs/Fire.mp3")){
    echo "YAY";
    header('Content-type: {$mime_type}');
    header('Content-length: ' . filesize($file));
    header('Content-Disposition: filename="' . $filename);
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');
    readfile("songs/Fire.mp3");
}else{
    echo "NO";
    header("HTTP/1.0 404 Not Found");
}

?>
