<?php
 
// array for final json respone
$response = array();


 
if (isset($_POST['toU'])) { 
 
    // reading other post parameters

	$toU = isset($_POST['toU']) ? $_POST['toU'] : '';
     
    try {
        
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
				$sql = "(select id, name, fromU, description from challengeme where challengeme.challenge <1 and challengeme.toU='".$toU."');";
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