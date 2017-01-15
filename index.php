<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <link href="images/favicon.ico" rel="icon" type="image/png">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <title>REPL▶Y!</title>
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
                        <td>Number of times to play song:</td>
                        <td><input placeholder="count"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Gap time in between playbacks:</td>
                        <td><input placeholder="seconds"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Snippet of the song (Optional):</td>
                        <td>
                            <input name="startMin" placeholder="min" type="text">&#58;
                            <input name="startSec" placeholder="start sec" type="text">
                        </td>
                        <td>~
                            <input name="endMin" placeholder="min" type="text">&#58;
                            <input name="endSec" placeholder="sec" type="text">
                        </td>
                    </tr>
                </tbody>
            </table><button class="buttonTransition" type="button">Apply</button>
        </div>
    </div>
    <div id="sidebar">
        <div id="songlist">
            <h1>List of Songs</h1>
            <form action="sendMusic.php" enctype="multipart/form-data" method="post">
                <select name="selectedSong">
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
                <input class="buttonTransition" name="submitList" type="submit" value="Play">
            </form>
        </div>
        <div id="upload">
            <h1>Upload</h1>
            <form action="upload.php" enctype="multipart/form-data" method="post">
                <uploadfile>
                    <input id="fileToUpload" accept=".mp3,.wav,.m4a,.aac"  name="fileToUpload" type="file">
                    <input id="filename" name="displayName" placeholder="File Name" type="text">
                    <input class="buttonTransition" name="submitUpload" type="submit" value="Submit">
                </uploadfile>
            </form>
        </div>
    </div>
    <!--Extension check-->
    <script src="jquery.js"></script>
    <script>
        $( "uploadfile" ).change(function() {
            var fileext = $("#fileToUpload").val().split('.').pop();
            if($.inArray(fileext, ['wav','mp3','m4a','aac']) == -1) {
                alert('invalid extension!');
                $("#fileToUpload").val('')
        }});
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type='text/javascript'>
    $(document).ready(function() {
      //option A
      $("form").submit(function(e){
        if ($("#fileToUpload").val() == ''){
          alert('Please select a file!');
          e.preventDefault(e);
        }
        else if ($("#filename").val() == ''){
          alert('Please enter a name for your file!');
          e.preventDefault(e);
        }
      });
    });
    </script>
    <footer>
        <a href="https://github.com/mrdanshih/mloop"><img alt="GitHub" src=
        "images/octocat.png"></a>
    </footer>
</body>
</html>
