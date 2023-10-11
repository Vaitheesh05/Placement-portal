<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Application Form</title>
    <style>
      body {
	     background-image: url("BITS.jpg");
    background-size: cover;
    background-position: center;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        background-color: #f8f8f8;
      }
	  .logo {
			position: absolute;
			top: 0;
			left: 0;
			width: 100px;
			height: 110px;
		}
      form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
      }
     
      label {
        display: block;
        margin-bottom: 5px;
      }
      input[type="text"],
      input[type="date"] {
        display: block;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-bottom: 20px;
        box-sizing: border-box;
      }
      input[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
<body>
  <img class="logo" src="B.png">
  <form method="POST" onsubmit="return confirm('Are you sure you want to submit?');">
    <label for="CName">Company Name:</label>
    <input type="text" name="CName" id="CName">

    <label for="jobs">Job Title:</label>
    <input type="text" name="jobs" id="jobs">

    <button type="submit">Submit</button>
  </form>

  <?php
    session_start();

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vaitheesha";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the company name and job title from the form
    $cname = $_POST['CName'];
    $job = $_POST['jobs'];

    // Update the corresponding company record in the database
    $sql = "UPDATE company SET jobs=CONCAT(jobs, ', $job') WHERE CName='$cname'";
    if (mysqli_query($conn, $sql)) {

    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
  ?>
</body>

</html>
