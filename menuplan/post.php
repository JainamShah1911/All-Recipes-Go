<?php
$start = $_POST['startdate'];
$end = $_POST['enddate'];
$user_id = $_POST['user_id'];
$recipe_id = $_POST['recipe_id'];


$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "allrecipe";

		// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con){
	echo 'nok';
}
else{
	echo 'ok';
}
		
$sql = "INSERT INTO menu_planer (user_id,recipe_id,start_date,end_date)
				VALUES (".$user_id.",".$recipe_id.",'".$start."','".$end."')";
if ($con->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $con->error;
}				
//$result = mysqli_query($con,$sql);
//echo $result.'Yash';
mysqli_close($con);
?>
</body>
</html>