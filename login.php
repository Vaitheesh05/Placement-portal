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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the username, password, and user type entered by the user
  $username = $_POST["username"];
  $password = $_POST["password"];
  $user = $_POST["user"];
  
  // SQL query to select the username, password, and user type from the login table
  $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND user = '$user'";
  
  // Execute the query
  $result = $conn->query($sql);
  
  // Check if there is a row with the given username, password, and user type
  if ($result->num_rows == 1 && $user == "Admin") {
    // Start the session
    session_start();

    // Set session variables
    $_SESSION["username"] = $username;
    $_SESSION["user_type"] = $user;

    // Redirect the user to the admin page
    header("Location:http://localhost/BITS portal/admin2.html");
    exit();
  }
   else if ($result->num_rows == 1 && $user == "Students") {
    // Start the session
    session_start();

    // Set session variables
    $_SESSION["username"] = $username;
    $_SESSION["user_type"] = $user;

    // Redirect the user to the student page
    header("Location:http://localhost/BITS portal/student1.html");
    exit();
  }  
   else if ($result->num_rows == 1 && $user == "Company") {
    // Start the session
    session_start();

    // Set session variables
    $_SESSION["username"] = $username;
    $_SESSION["user_type"] = $user;

    // Redirect the user to the company page
    header("Location:http://localhost/BITS portal/company2.html");
    exit();
  }  
  else {
    // Display an error message in a pop-up window
    echo '<script>alert("Invalid username, password, or user type."); window.location.href = "login.php";</script>';
  }
}

// Close the connection
$conn->close();

// Start the session
session_start();

// Destroy all sessions
session_destroy();

// Redirect the user to the login page
header("Location: http://localhost/BITS portal/login.php");
exit();
?>
