<?php


$name=$_POST['name[0]'];
$phone=$_POST['phone[0]'];
$email=$_POST['email[0]'];
$gender=$_POST['gender'];
$city=$_POST['city'];
$college=$_POST['college'];
$event=$_POST['event'];

//DataBase Connection

$conn = new mysqli('localhost','root','','ripple2k19');

if($conn->connect_error){
die('Connection Failed:'.$conn->connect_error);
}
else
{
	$stmt = $conn->prepare("insert into registration(name,phone,email,gender,city,college,event)values(?,?,?,?,?,?,?)");
	
	$stmt ->bind_param("sssssss",$name,$phone,$email,$gender,$city,$college,$event);
	
	echo "Registration Successful....";
	$stmt->close();
	$conn->close();
}	

?>