<?php
 
// array for final json respone
$response = array();


 
if (isset($_POST['name']) && isset($_POST['fromU'])  && isset($_POST['toU']) && isset($_POST['description'])) { 
 
    // reading other post parameters
    $name = isset($_POST['name']) ? $_POST['name'] : '';
	$fromU = isset($_POST['fromU']) ? $_POST['fromU'] : '';
	$toU = isset($_POST['toU']) ? $_POST['toU'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
     

    try {
        
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
				$sql = "insert into challengeme (name, fromU, toU, description) VALUES ('" . $name  . "','" .$fromU ."', '". $toU."', '". $description. "')";
				$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
					// File successfully uploaded
        		$response['message'] = 'Izziv zabelezen!';
        		$response['error'] = false;
		
		
  
    } catch (Exception $e) {
        // Exception occurred. Make error flag true
        $response['error'] = true;
        $response['message'] = $e->getMessage();
    }
} else {
    // File parameter is missing
    $response['error'] = true;
    $response['message'] = 'Nisem prejel vseh parametrov!';
}
 
// Echo final json response to client

echo json_encode($response);

?>