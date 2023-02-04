<?php
// Connect to the MySQL database
$host = "localhost";
$user = "root";
$password = "";
$db = "test2";
$conn = mysqli_connect($host, $user, $password, $db);

if(isset($_POST['download'])) {
  // Retrieve data
  $query = "SELECT * FROM student";
  $result = mysqli_query($conn, $query);
  
  // Create and download the excel file
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=data.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  
  // Write the data to the excel file
  echo "id\tfirst name\tsecond name\tage\n";
  while($row = mysqli_fetch_array($result)) {
    echo $row['id'] . "\t" . $row['first name'] . "\t" . $row['second name'] ."\t" . $row['age'] . "\n";
  }
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Download Excel</title>
  </head>
  <body>
    <form method="post">
      <input type="submit" name="download" value="Download Excel">
    </form>
  </body>
</html>