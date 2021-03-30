<?php
	$connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db($connection,"healthcare");
	if (isset($_POST['submit']))
	{
		$day = $_POST['day'];
		$dname=$_POST['dname'];
		$special=$_POST['special'];
		$contact=$_POST['contact'];
		$query = mysqli_query($connection,"update timetable set
		name='$dname', specialization='$special', contact='$contact' where day='$day'");
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