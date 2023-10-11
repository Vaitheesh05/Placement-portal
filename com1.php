<!DOCTYPE html>
<html>
<head>
	<title>Company Details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	.container {
		width: 80%;
		margin: 0 auto;
		padding: 20px;
		background-color: #f9f9f9;
		border: 1px solid #ddd;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
	}
	.logo {
			position: absolute;
			top: 0;
			left: 0;
			width: 100px;
			height: 100px;
		}
	header {
	background-color: #333;
	color: #fff;
	text-align: center;
	padding: 20px;
}
  h1 {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
        }
.company-name {
	text-align:center;
	font-size: 32px;
	font-weight: bold;
	margin-bottom: 10px;
	color: #007bff;
}

.company-description {
	font-size: 18px;
	line-height: 1.5;
	margin-bottom: 20px;
	color: #333;
}

.company-ceo,
.company-industry ,jobs{
	font-size:18px;
	margin-bottom: 5px;
	color: #333;
}

.company-website a {
	font-size:18px;
	color: #007bff;
	text-decoration: none;
	font-weight: bold;
}

.error {
	color: red;
	font-weight: bold;
	margin-bottom: 20px;
}

.button {
	 display: inline-block;
	 
    padding: 8px 16px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
 background-color: #0056b3;
}
</style>
</head>
<body>
   	<img class="logo" src="B.png">
	<div class="container">
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
			$CID = $_GET["CID"];
			$sql = "SELECT CName, CDesc, CEO, Website, Industry,jobs FROM company WHERE CID = " . $CID;
			$result = mysqli_query($conn, $sql);
			if (!$result) {
				echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
			} elseif (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<header><h1>" . $row["CName"] . "</h1></header>";
          echo "<p class='company-description'>" . (isset($row["CDesc"]) ?"<b>DESCRIPTION :</b><br><ul><li>" . str_replace(",", "</li><li>", $row["CDesc"]) . "</li></ul>" : "") . "</p>";
            echo "<p class='company-ceo'>" . (isset($row["CEO"]) ? "<b>CEO: </b>" . $row["CEO"] : "") . "</p>";
            echo "<p class='company-website'>" . (isset($row["Website"]) ? "<b>Website:</b> <a href='" . $row["Website"] . "'></th>" . $row["Website"] . "</a>" : "") . "</p>";
            echo "<p class='company-industry'>" . (isset($row["Industry"]) ? "<b>Industry: </b>" . $row["Industry"] : "") . "</p>";
	echo "<p class='jobs'>" . (isset($row["jobs"]) ?"<b>Jobs :</b><br><ul><li>" . str_replace(",", "</li><li>", $row["jobs"]) . "</li></ul>" : "") . "</p>";
				}
			} else {
				echo "<p class='error'>No company details found for the selected ID.</p>";
			}
			mysqli_close($conn);
		?>
		</div>
<center><a href="http://localhost/com.html" class="button">Back to List</a></center>
</div>
</div>
</body>
</html>