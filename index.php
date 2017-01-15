<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <link href="images/favicon.ico" rel="icon" type="image/png">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <title>REPL▶Y!</title>
</head>
<body>
    <div id="title"><img alt="Repl▶y!: Music On Loop" src="images/logo.png"></div>
    <div id="main">
        <div id="player">
            <audio id="song" autoplay controls="" src="retrieveMusic.php">

            </audio>
        </div>
        <div id="options">
            <h1>Options</h1>
            <table>
                <tbody>
                    <tr>
                        <td>Number of times to play song:</td>
                        <td><input id="loopCount" placeholder="count"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Gap time in between playbacks:</td>
                        <td><input id="breakTime" placeholder="seconds"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Snippet of the song (Optional):</td>
                        <td>
                            <input id="startMin" placeholder="min" type="text">&#58;<input id="startSec" placeholder="start sec" type="text">
                        </td>
                        <td>~
                            <input id="endMin" placeholder="min" type="text">&#58;<input id="endSec" placeholder="sec" type="text">
                        </td>
                    </tr>
                </tbody>
            </table><button class="buttonTransition" type="button" onclick="updateOptions();">Apply</button>
        </div>
    </div>
    <div id="sidebar">
        <div id="songlist">
            <h1>List of Songs</h1>
            <form action="changeSongRank.php" enctype="multipart/form-data" method="post">
                <select name="songsList" id="songsList">
                    <?php
    				$servername = "localhost";
    				$username = "dan";
    				$password = "hello";
    				$dbname = "mlooper";
    				$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
    				$sql_query = mysqli_query($conn, "SELECT name FROM music ORDER BY listOrder DESC");
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
            <uploadform><form action="upload.php" enctype="multipart/form-data" method="post">
                <uploadfile>
                    <input id="fileToUpload" accept=".mp3,.wav,.m4a,.aac"  name="fileToUpload" type="file">
                    <input id="filename" name="displayName" placeholder="File Name" type="text">
                    <input class="buttonTransition" name="submitUpload" type="submit" value="Submit">
                </uploadfile>
            </form></uploadform>
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
    <!-- File and Filname Existence Validation -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type='text/javascript'>
    $(document).ready(function() {
        //option A
        $("uploadform").submit(function(e) {
            if ($("#fileToUpload").val() == '') {
                alert('Please select a file!');
                e.preventDefault(e);
        }
        else if ($("#filename").val() == '') {
            alert('Please enter a name for your file!');
            e.preventDefault(e);
        }
        });
    });
    </script>
    <!-- Audio Script -->
    <script>
        myAudio=document.getElementById('song');
        // myAudio.addEventListener('canplaythrough', function() {
        //   if(this.currentTime < 100){this.currentTime = 100;}
        //   this.play();
        // });
        var startTime = 0;
        var endTime = 0;
        var breakTime = 0;
        var numLoops = 0;
        var vid = document.getElementById("song");
        var stop = false;
        var count = 0;
        var reset_interval = null;
        function updateOptions() {
            console.log("OK");
            startTime = parseInt(document.getElementById("startMin").value)*60 + parseInt(document.getElementById("startSec").value);
            endTime = parseInt(document.getElementById("endMin").value)*60 + parseInt(document.getElementById("endSec").value)+1;
            breakTime = parseInt(document.getElementById("breakTime").value);
            numLoops = parseInt(document.getElementById("loopCount").value);
            count = numLoops;
            loop();
        }
        function loop() {
            if(count > 0){
                vid.currentTime = startTime;
                reset_interval = setInterval(pause, (endTime-startTime)*1000 );
                vid.play();
            }
        }
        function pause() {
            vid.pause();
            count--;
            clearInterval(reset_interval);
            window.setTimeout(loop,breakTime*1000);
        }
        function reset() {
            vid.currentTime = startTime;
            count--;
            loop();
        }
    </script>
    <footer>
        <a href="https://github.com/mrdanshih/mloop"><img alt="GitHub" src="images/octocat.png"></a>
    </footer>
</body>
</html>
