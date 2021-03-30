<html>

<title></title>
<?php
	if(isset($_POST['submit']))
	{
		$name=$_POST['username'];
		$password=$_POST['password'];
		$found=0;
		if($name=="local" && $password=="local")
		{
			echo "Succesful login1";
		}
		else if($name=="admin" && $password=="admin")
		{
			echo "valid Admin user";
		}
		else
		{
			echo "Invalid";
		}
	}
?>

</html>
	