<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vaitheesha";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get values from form
$CID = $_POST["CID"];
$CName = $_POST["CName"];
$CDesc = mysqli_real_escape_string($conn, $_POST["CDesc"]);
$CEO = $_POST["CEO"];
$Website = $_POST["Website"];
$Industry = $_POST["Industry"];
$Location = $_POST["location"];
$Avg = $_POST["avg"];

// insert values into database
$sql = "INSERT INTO company (CID, CName, CDesc, CEO, Website, Industry,location)
        VALUES ('$CID', '$CName', '$CDesc', '$CEO', '$Website', '$Industry','$Location','$Avg')";

if ($conn->query($sql) === TRUE) {
    echo "New company added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// close database connection
$conn->close();
?>