<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vaitheesha";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$rno=$_POST["rno"];


$sql = "select* from student where Rollno=$Rollno";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	$row=$result->fetch_assoc();
	$Rollno=$row["Rollno"];
	$Name=$row["Name"];
	$Password=$row["Password"];
	$City=$row["City"];
	$Email=$row["Email"];
	$City=$row["City"];
	$State=$row["State"];
	$City=$row["City"];
	$Date of Birth=$row["Date of Birth"];
	$Skills=$row["Skills"];
	$Contact=$row["Contact"];
echo
  "<html>
  <body>
  <form action='update1.php' method='POST'>
  Rollno:<input type='number' name='rno' value='$rno'><br>
  Name:<input type='text' name='name' value='$name'><br>
  Password:<input type='text' name='Rollno' value='$Password'><br>
   City:<input type='text' name='City' value='$City'><br>
    Email:<input type='text' name='Email' value='$Email'><br>
	City:<input type='text' name='City' value='$City'><br>
	 State:<input type='text' name='State' value='$State'><br>
	 Date of Birth:<input type='text' name='Date of Birth' value='$DateofBirth'><br>
	 Skills:<input type='text' name='Skills' value='$Skills'><br>
	 Contact:<input type='text' name='Contact' value='$Contact'><br>
  <input type='submit' value='Submit'>
  </form>

</body>
</html>";

} else {
	echo "Not Found";
}
$conn->close();
?>
