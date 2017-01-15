<html lang='en'>

<button onclick="setTime()" type="button">Set time position to 5 seconds</button><br>


<audio id="player" src="sendMusic.php" controls="controls">
  Your browser does not support the audio element.
</audio>

<script type="text/javascript">
  var myAudio=document.getElementById('player')
  function setTime() {
    myAudio.currentTime=5;
  }

</script>


<!-- <select name="taskOption">
  <option value="1">First</option>
  <option value="2">Second</option>
  <option value="3">Third</option>
</select> -->

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
</html>
