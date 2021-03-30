<?php


echo '
	<!DOCTYPE html>
	<html>
	<head>
		<style>
			body {
			font-family: sans-serif;
			font-size: 20px;
			color: #444;
			font-color:#ff0000;
		}
		.button {
			display: inline-block;
			padding: 15px 25px;
			font-size: 24px;
			cursor: pointer;
			text-align: center;
			text-decoration: none;
			outline: none;
			color: #fff;
			background-color: #4CAF50;
			border: none;
			border-radius: 15px;
			box-shadow: 0 9px #999;
		}

		.button:hover {background-color: #3e8e41}

		.button:active {
			background-color: #3e8e41;
			box-shadow: 0 5px #666;
			transform: translateY(4px);
		}
		
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
			background-color: #4CAF50;
			text-align: center;
			color: white;
		}
		td {
			text-align: center;
		}
		
		</style>
	</head>
<body oncontextmenu="return false;">

<form action="event.php" method="post" >
	<br>
	<br>
	&nbsp
	&nbsp
	&nbsp
	&nbsp
	&nbsp
	&nbsp
	&nbsp
	<input type="submit" class="button" value="Stock" name="stock">
	&nbsp
	<input type="submit" class="button" value="Patients" name="patients">
	&nbsp
	<input type="submit" class="button" value="Live" name="live">
	&nbsp
	<input type="submit" class="button" value="Logout" name="logout">
	<pre>
	
	<pre>
</form>
</body>
</html>';
	
//HTML Ends	
$con=mysqli_connect("localhost","root","","healthcare");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	
	$selected;
	if(isset($_POST["stock"]))
    {
	   $result = mysqli_query($con,"SELECT * FROM stock");
		echo "<table border='2' align=center>
		<tr>
		<th>ID</th>
		<th>MEDICINE NAME</th>
		<th>STOCK AVAILABLE</th>
		<th>STOCK CONSUMED</th>
		<th>STOCK REQUIRED</th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		  {

		  echo "<tr>";
		  echo "<td>" . $row['id'] . "</td>";
		  echo "<td>" . $row['medicinename'] . "</td>";
		  echo "<td>" . $row['available'] . "</td>";
		  echo "<td>" . $row['consumed'] . "</td>";
		  echo "<td>" . $row['required'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";

	}
	else if(isset($_POST["patients"]))
    {
	   $result = mysqli_query($con,"SELECT * FROM patients");
		echo "<table border='2' align=center>
		<tr>
		<th>ID</th>
		<th>DATE</th>
		<th>TOTAL TOKENS</th>
		<th>PATIENTS VISITED</th>
		
		</tr>";

		while($row = mysqli_fetch_array($result))
		  {

		  echo "<tr>";
		  echo "<td>" . $row['sno'] . "</td>";
		  echo "<td>" . $row['date'] . "</td>";
		  echo "<td>" . $row['totaltokens'] . "</td>";
		  echo "<td>" . $row['visited'] . "</td>";
		  
		  echo "</tr>";
		  }
		echo "</table>";

	}
	else if(isset($_POST["logout"]))
    {
		header("Location: ../index.html");
	}
	else if(isset($_POST["live"]))
    	{
		header("Location:http://192.168.137.222:8080");
	}
  

mysqli_close($con);
?>