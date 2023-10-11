<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
		.logo {
			position: absolute;
			top: 0;
			left: 0;
			width: 100px;
			height: 100px;
		}
        header {
            background-color: #222;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 50px;
            font-size: 16px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        th {
            background-color: #222;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .edit-profile {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .edit-profile:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <img class="logo" src="B.png">
    <header>
        <h1>Company Reports</h1>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
				<th>Img</th>
                <th>Name</th>
                <th>Website</th>
                <th>CEO</th>
                <th>location</th>
                <th>Avg_Salary</th>
            </tr>
        </thead>
        <tbody>
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

    $stmt = $conn->prepare("SELECT * FROM company");

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
    

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["CID"] . "</td>";
            echo "<td>" . $row["CName"] . "</td>";
            echo "<td>" . $row["Website"] . "</td>";
            echo "<td>" . $row["CEO"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . $row["avg"] . "</td>";
            echo "<td><img src='BITS portal/google.jpeg' alt='Company Image' width='100'></td>"; // Updated image source
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No company details found";
    }

    $conn->close();
?>

	</body>
</html>