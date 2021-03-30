<html>

<title>Time Table</title>
<style>
$baseColor: #398B93;
$borderRadius: 10px;
$imageBig: 100px;
$imageSmall: 60px;
$padding: 10px;

body {
   background-color: #398B93, 30%);
   * { box-sizing: border-box; }
}

.header1 {
   background-color: #398B93;
   color: white;
   font-size: 1.5em;
   padding: 1rem;
   text-align: center;
   text-transform: uppercase;
}

img {
   border-radius: 50%;
   height: $imageSmall;
   width: $imageSmall;
}

.table-users {
   border: #398B93;
   border-radius: $borderRadius;
   box-shadow: 3px 3px 0 rgba(0,0,0,0.1);
   max-width: calc(100% - 2em);
   margin: 1em auto;
   overflow: hidden;
   width: 800px;
}

table {
   width: 100%;
   
   td, th { 
      color: #398B93;
      padding: 10px; 
   }
   
   td {
      text-align: center;
      vertical-align: middle;
      
      &:last-child {
         font-size: 0.95em;
         line-height: 1.4;
         text-align: left;
      }
   }
   
   th { 
      background-color:#398B93;
      font-weight: 300;
   }
   
   tr {     
      &:nth-child(2n) { background-color: white; }
      &:nth-child(2n+1) { background-color: #398B93 }
   }
}

@media screen and (max-width: 700px) {   
   table, tr, td { display: block; }
   
   td {
      &:first-child {
         position: absolute;
         top: 50%;
         transform: translateY(-50%);
         width: $imageBig;
      }

      &:not(:first-child) {
         clear: both;
         margin-left: $imageBig;
         padding: 4px 20px 4px 90px;
         position: relative;
         text-align: left;

         &:before {
            color: #398B93;
            content: '';
            display: block;
            left: 0;
            position: absolute;
         }
      }

      &:nth-child(2):before { content: 'Name:'; }
      &:nth-child(3):before { content: 'Email:'; }
      &:nth-child(4):before { content: 'Phone:'; }
      &:nth-child(5):before { content: 'Comments:'; }
   }
   
   tr {
      padding: $padding 0;
      position: relative;
      &:first-child { display: none; }
   }
}

@media screen and (max-width: 500px) {
   .header {
      background-color: transparent;
      color: lighten($baseColor, 60%);
      font-size: 2em;
      font-weight: 700;
      padding: 0;
      text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
   }
   
   img {
      border: 3px solid;
      border-color: lighten($baseColor, 50%);
      height: $imageBig;
      margin: 0.5rem 0;
      width: $imageBig;
   }
   
   td {
      &:first-child { 
         background-color: lighten($baseColor, 45%); 
         border-bottom: 1px solid lighten($baseColor, 30%);
         border-radius: $borderRadius $borderRadius 0 0;
         position: relative;   
         top: 0;
         transform: translateY(0);
         width: 100%;
      }
      
      &:not(:first-child) {
         margin: 0;
         padding: 5px 1em;
         width: 100%;
         
         &:before {
            font-size: .8em;
            padding-top: 0.3em;
            position: relative;
         }
      }
      
      &:last-child  { padding-bottom: 1rem !important; }
   }
   
   tr {
      background-color: white !important;
      border: 1px solid lighten($baseColor, 20%);
      border-radius: $borderRadius;
      box-shadow: 2px 2px 0 rgba(0,0,0,0.1);
      margin: 0.5rem 0;
      padding: 0;
   }
   
   .table-users { 
      border: 1; 
      box-shadow: none;
      overflow: visible;
   }
}
</style>
<body>
<div style='background-color: #398B93;color: white;font-size: 1.5em;padding: 1rem;text-align: center;text-transform: uppercase;'>DOCTORS SCHEDULE</div>

<?php
	$a=mysqli_connect("localhost","root","");
	if(!$a)
	{
	}
	else
	{
		mysqli_select_db($a,"healthcare");
		$sql="SELECT *FROM timetable";
		if($result=mysqli_query($a,$sql))
		{
			if(mysqli_num_rows($result)>0)
			{
				echo "<table class='table-users' style='width: 100%; height: 100%'
   td, th { 
      color: #398B93;
      padding: 10px; ' border=1; >";
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>DAY</th>";
				echo "<th>NAME</th>";
				echo "<th>SPECIALIZATION</th>";
				echo "<th>CONTACT</th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td style='&:first-child { 
         background-color:#398B93; 
         border-bottom: #398B93;
         border-radius: 10px 10px 0 0;
         position: relative;   
         top: 0;
         transform: translateY(0);
         width: 100%;'>".$row["id"]."</td>";
					echo "<td>".$row["day"]."</td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["specialization"]."</td>";
					echo "<td>".$row["contact"]."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}
	}
	mysqli_close($a);
?>

</body>
</html>