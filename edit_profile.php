<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
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
        form {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
 <img class="logo" src="B.png">

    <header>
        <h1>Edit Profile</h1>
    </header>
   <form method="post" action="updateprofile.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="<?php echo isset($row["Email"]) ? $row["Email"] : ""; ?>"><br>

    <label for="contact">Contact:</label>
    <input type="text" id="contact" name="contact" required value="<?php echo isset($row["Contact"]) ? $row["Contact"] : ""; ?>"><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required value="<?php echo isset($row["City"]) ? $row["City"] : ""; ?>"><br>

    <label for="state">State:</label>
    <input type="text" id="state" name="state" required value="<?php echo isset($row["State"]) ? $row["State"] : ""; ?>"><br>

    <label for="skills">Skills:</label>
    <input type="text" id="skills" name="skills" required value="<?php echo isset($row["Skills"]) ? $row["Skills"] : ""; ?>"><br>

    <input type="hidden" name="rollno" value="<?php echo isset($row["Rollno"]) ? $row["Rollno"] : ""; ?>">
    <input type="submit" value="Update">
</form>

</body>
</html>
