<?php

$emparray=array();

if (isset($_POST['username'])) {
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
			
		$sql = "select username, points from users where username != '". $_POST['username']. "'";
		$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		
		
		while($row =mysqli_fetch_assoc($result))
		{
			$emparray[] = $row;
		}
}

	echo json_encode($emparray);

?>