<?php
 
// array for final json respone
$response = array();


 
if (isset($_POST['fromU'])) { 
 
    // reading other post parameters

	$fromU = isset($_POST['fromU']) ? $_POST['fromU'] : '';
     
    try {
        
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
				$sql = "(select * from challengeme where fromU = '".$fromU."')";
				$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

				while($row =mysqli_fetch_assoc($result))
				{
					$response[] = $row;
				}

    } catch (Exception $e) {

    }
} else {

}
 
// Echo final json response to client

echo json_encode($response);

?>