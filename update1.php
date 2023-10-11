<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vaitheesha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Rollno=$_POST["Rollno"];
$Name=$_POST["Name"];
$Password=$_POST["Password"];
$City=$_POST["City"];
$Email=$_POST["Email"];
$State=$_POST["State"];
$Date of Birth=$_POST["Date of Birth"];
$Skills=$_POST["Skills"];
$Contact=$_POST["Contact"];
$sql = "update student set Name='$Name',Password='$Password',City='$City',Email='$Email',State='$State',Date of Birth='$Date',Skills='$Skills',Contact='$Contact' where rno=$rno";

if ($conn->query($sql) === TRUE) {
  echo "Record Updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>