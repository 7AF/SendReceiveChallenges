<?php

if(!empty($_GET["username"])){
	
	$username = $_GET["username"];
	$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
	$sql = "select id, mail, username, points, friends from users where username = '" . $username . "'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
	
	$emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
	
	echo json_encode($emparray);
	
	
}


?>