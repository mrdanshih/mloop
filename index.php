<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <title>REPL▶Y!</title>
    <script src="jquery.js">
    </script>
</head>
<body>
    <div id="title"><img alt="Repl▶y!: Music On Loop" src=
    "images/logo.png"></div>
    <div id="main">
        <!--Place audio player here-->
        <div id="player">
            <audio autoplay="" controls="" loop="">
            <!--Need to change this to correspond to chosen music file--></audio>
        </div><!--need to add skip previous and next buttons-->
        <div id="options">
            <h1>Options</h1>
            <table>
                <tbody>
                    <tr>
                        <td>Number of times to play song:<input placeholder="count"></td>
                        <td><button type="button">Apply</button></td>
                    </tr>
                    <tr>
                        <td>Gap time in between playbacks:<input placeholder="seconds"></td>
                        <td><button type="button">Apply</button></td>
                    </tr>
                    <tr>
                        <td>Snippet of the song (Optional):<input name=
                        "startMin" placeholder="min" type=
                        "text">&#58;<input name="startSec" placeholder=
                        "start sec" type="text"></td>
                        <td>~<input name="endMin" placeholder="min" type=
                        "text">&#58;<input name="endSec" placeholder="sec"
                        type="text"></td>
                        <td><button type="button">Apply</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="sidebar">
        <h1>List of Songs</h1>
        <select name='songs'>
            <?php
			$servername = "localhost";
			$username = "dan";
			$password = "hello";
			$dbname = "mlooper";
			$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
			$sql_query = mysqli_query($conn, "SELECT name FROM music");
			while($row = $sql_query->fetch_assoc()){
			    echo "<option>" . $row['name'] . "</option>";
			}
			?>
        </select>
        <h1>Upload</h1>
        <form action="upload.php" enctype="multipart/form-data" method="post">
            <input accept=".mp3,.wav,.m4a,.aac" id="fileToUpload" name=
            "fileToUpload" type="file">
            <input name="displayName" type="text" placeholder="File Name">
            <input name="submit" type="submit" value="Submit">
        </form>
    </div><!--Extension check-->
    <script src="jquery.js">
    </script>
    <script>
      $( "uploadfile" ).change(function() {
      var fileext = $("#fileToUpload").val().split('.').pop();
      if($.inArray(fileext, ['wav','mp3','m4a','aac']) == -1) {
        alert('invalid extension!');
        $("#fileToUpload").val('')
      }
    });
    </script>
    <footer>
        <a href="https://github.com/mrdanshih/mloop"><img alt="GitHub" src=
        "images/octocat.png"></a>
    </footer>
</body>
</html>
