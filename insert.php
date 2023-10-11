<?php
$servername="localhost";
$username="root";
$password="";
$dbname="vaitheesh";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
	die("Connection failed :".$conn->connect_error);
}

$sql="select* from detail";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	echo "<b><center>Student details</b><br>";
	echo '<center><table border="1">';
	echo
	 '<tr>
	     <th>Rno</th>
		 <th>Name</th>
		 <th>Age</th>
		 <th>Branch</th>
	</tr>';
	while($row=$result->fetch_assoc())
	{
      echo 
          '<tr>
              <td>'.$row["rno"].'</td>
               <td>'.$row["name"].'</td>
               <td>'.$row["age"].'</td>
               <td>'.$row["branch"].'</td>
           </tr>';
	}		   
}
else
{
	echo "Results not found";
}

$conn->close();
?>