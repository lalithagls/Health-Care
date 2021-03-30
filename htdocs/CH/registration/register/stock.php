<?php
	$connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db($connection,"healthcare");
	if (isset($_POST['submit']))
	{
		$mname=$_POST['mname'];
		$available=$_POST['available'];
		$required=$_POST['required'];
		$consumed=$_POST['consumed'];
		$query = mysqli_query($connection,"update stock set
		available='$available', consumed='$consumed', required='$required' where medicinename='$mname'");
	}
	//echo $query;
	if($query)
	{
		header("Location: success.html");
	}
	else
	{
		header("Location: unsuccess.html");
	}
?>