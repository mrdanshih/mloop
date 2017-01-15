<html lang='en'>


<button onclick="setTime()" type="button">Set time position to 5 seconds</button><br>
<h1 id = "myHeader"> Hello World</h1>

<audio id="player" src="" controls="controls" type="audio/mp3">
  Your browser does not support the audio element.
</audio>

</script>

<!-- <form method = "POST" action = "process.php">
  <select id="taskOption" name="taskOption">
    <option>AIDS</option>
    <option>Second</option>
    <option>Third</option>
  </select>
  <input type="submit" value="Submit the form"/>
</form>
 -->

<audioform><form action="process.php" enctype="multipart/form-data" method="post">
    <select id="songsList" name="songsList">
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
</form></audioform>


<?php


// $servername = "localhost";
// $username = "dan";
// $password = "hello";
// $dbname = "mlooper";
//
//
// $conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
//
// $display_name = $_POST["songs_list"];
//
// $sql_query = mysqli_query($conn, "SELECT file_path FROM music WHERE name = 'Stonehenge' limit 1");
// $query_row = mysqli_fetch_assoc($sql_query);
// $file = $query_row["file_path"];
//
// echo $file;

?>




<script src="jquery.js"></script>

<script>
  $(document).ready(function() {

            $("audioform").click(function() {
                //alert($(this).attr('id'));
                $.ajax({
                    type: "POST",
                    url: 'process.php'
                    data: {name: 'Paris'}
                    success: function(data)
                    {
                        alert("success!");
                    }
                });
            });
        });

  <?php //logtime.php
  $uid = isset($_POST['userID']);
  //rest of code that uses $uid
  ?>
</script>




</html>
