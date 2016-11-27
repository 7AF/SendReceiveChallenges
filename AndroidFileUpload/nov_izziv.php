<?php
 
// array for final json respone
$response = array();


 
if (isset($_POST['fromU']) && isset($_POST['toU']) && isset($_POST['name']) && isset($_POST['description'])) { 
 
    // reading other post parameters

	$fromU = isset($_POST['fromU']) ? $_POST['fromU'] : '';
	$toU = isset($_POST['toU']) ? $_POST['toU'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	
    try {
        
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
				$sql = "insert into challengeme (fromU, toU, name, description) VALUES ('" . $fromU  . "','" .$toU ."', '". $name. "', '" .$description."')";
				$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
					// File successfully uploaded
        		$response['message'] = 'Izziv uspesno dodan!';
        		$response['error'] = false;

    } catch (Exception $e) {
		$response['error'] = true;
        $response['message'] = $e->getMessage();
    }
} else {
	$response['error'] = true;
    $response['message'] = "Prejel sem napacne agrumente!";
}
 
// Echo final json response to client

echo json_encode($response);

?>