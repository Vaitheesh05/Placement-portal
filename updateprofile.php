<?php
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vaitheesha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $city = $_POST["city"];
    $state = $_POST["state"];
    $contact = $_POST["contact"];
    $skills = $_POST["skills"];
    $email = $_POST["email"];

    // Update the student's details in the database
    $stmt = $conn->prepare("UPDATE student SET City=?, State=?, Contact=?, Skills=?, Email=? WHERE Name=?");
    $stmt->bind_param("ssssss", $city, $state, $contact, $skills, $email, $_SESSION['username']);
    $stmt->execute();

    // Redirect back to the profile page
    header("Location: myaccount.php");
    exit();
}

// Retrieve the current student details from the database
$stmt = $conn->prepare("SELECT * FROM student WHERE Name = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output the update form
    while($row = $result->fetch_assoc()) {
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>Update Profile</title>";
        echo "<style type='text/css'>";
        echo "body {";
        echo "    font-family: Arial, sans-serif;";
        echo "    margin: 0;";
        echo "    padding: 0;";
        echo "    background-color: #f5f5f5;";
        echo "}";
        echo "header {";
        echo "    background-color: #222;";
        echo "    color: #fff;";
        echo "    padding: 20px;";
        echo "    text-align: center;";
        echo "}";
        echo "h1 {";
        echo "    margin-top: 20px;";
        echo "    margin-bottom: 10px;";
        echo "    font-size: 36px;";
        echo "    text-transform: uppercase;";
        echo "    letter-spacing: 2px;";
        echo "    font-weight: bold;";
        echo "}";
        echo "form {";
        echo "    width: 80%;";
        echo "    margin: 50px auto;";
        echo "    background-color: #fff;";
        echo "    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);";
        echo "    border-radius: 5px;";
        echo "    overflow: hidden;";
        echo "    padding: 20px;";
        echo "}";
        echo "label {";
        echo "    display: block;";
        echo "    margin-bottom: 10px;";
        echo "    font-weight: bold;";
        echo "}";
        echo "input[type=text], textarea {";
        echo "    width: 100%;";
        echo "    padding: 12px;";
        echo "    border: 1px solid #ccc;";
        echo "    border-radius: 4px;";
        echo "    box-sizing: border-box;";
        echo "    margin-bottom: 20px;";
         echo "input[type=text], textarea {";
         echo "width: 100%;";

		  echo "padding: 12px;";
		  echo "border: 1px solid #ccc;";
		  echo "border-radius: 4px;";
		  echo "box-sizing: border-box;";
		  echo "margin-bottom: 20px;";
		  echo "font-family: Arial, sans-serif;";
		  echo "font-size: 16px;";
		  echo "line-height: 1.5;";
		  echo "}";

		echo "input[type=text]:focus, textarea:focus {";
		  echo "outline: none;";
		  echo "border-color: #4CAF50;";
		  echo "box-shadow: 0px 0px 5px rgba(76, 175, 80, 0.5);";
		  echo "}";

		echo "input[type=submit] {";
		  echo "background-color: #4CAF50;";
		  echo "color: white;";
		  echo "padding: 12px 20px;";
		  echo "border: none;";
		  echo "border-radius: 4px;";
		 echo "cursor: pointer;";
		  echo "transition: all 0.3s ease;";
		echo "}";

		echo "input[type=submit]:hover {";
		  echo "background-color: #3e8e41;";
		echo "}";

		echo "label {";
		  echo "display: block;";
		  echo"margin-bottom: 6px;";
		  echo"font-weight: bold;";
		  echo"text-transform: uppercase;";
		  echo"letter-spacing: 1px;";
		echo"}";
		}
	}
