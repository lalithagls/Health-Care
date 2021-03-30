<?php
	$connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db($connection,"healthcare");
	if (isset($_POST['submit']))
	{
		$date1 = $_POST['date1'];
		$totaltokens=$_POST['totaltokens'];
		$visited=$_POST['visited'];
		
		$query = mysqli_query($connection,"INSERT INTO patients( date, totaltokens, visited) 
		VALUES ('$date1',$totaltokens,$visited)");
	}
	if($query)
	{
		header("Location: success.html");
	}
	else
	{
		header("Location: unsuccess.html");
	}
?>