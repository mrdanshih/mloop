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
$fileName = str_replace('songs/', "", $file);
$filesize = filesize($file);
$ctype = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";
$offset = 0;
$length = $filesize;

// if ( isset($_SERVER['HTTP_RANGE']) ) {
//     // if the HTTP_RANGE header is set we're dealing with partial content
//
//     $partialContent = true;
// 
//     // find the requested range
//     // this might be too simplistic, apparently the client can request
//     // multiple ranges, which can become pretty complex, so ignore it for now
//     preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches);
//
//     $offset = intval($matches[1]);
//     $length = intval($matches[2]) - $offset;
// } else {
//     $partialContent = false;
// }
//
// $file = fopen($file, 'r');
//
// // seek to the requested offset, this is 0 if it's not a partial content request
// fseek($file, $offset);
//
// $data = fread($file, $length);
//
// fclose($file);
//
// if ( $partialContent ) {
//     // output the right headers for partial content
//
//     header('HTTP/1.1 206 Partial Content');
//
//     header('Content-Range: bytes ' . $offset . '-' . ($offset + $length) . '/' . $filesize);
// }

// // output the regular HTTP headers
// header('Content-Type: ' . $ctype);
// header('Content-Length: ' . $filesize);
// header('Accept-Ranges: bytes');
//
// don't forget to send the data too
// print($data);

if(file_exists($file)){
    // header('Content-type: {$mime_type}');
    header('Content-length: ' . filesize($file));
    header('Content-Disposition: filename="' . $file);
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');
    readfile($file);
}else{
    header("HTTP/1.0 404 Not Found");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
