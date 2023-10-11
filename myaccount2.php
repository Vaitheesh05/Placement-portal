<?php

// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vaitheesha";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = $_POST["Rollno"];
    $name = $_POST["name"];
    $Branch = $_POST["Branch"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $contact = $_POST["contact"];
    $cname = $_POST["cname"];
    $job = $_POST["job"];
    $skills = $_POST["skills"];

    // Insert data into MySQL
    $sql = "INSERT INTO application (rollno, name, email,Branch, city, contact, cname, job, skills)
            VALUES ('$rollno', '$name','$Branch', '$email', '$city', '$contact', '$cname', '$job', '$skills')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Application submitted successfully. Redirecting to company page..."); window.location.href="com.html";</script>';

        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close MySQL connection
    mysqli_close($conn);
}

?>
