<?php
 
// array for final json respone
$response = array();


 
if (isset($_POST['username']) && isset($_POST['mail'])  && isset($_POST['password'])) {
 
    // reading other post parameters
    $email = isset($_POST['mail']) ? $_POST['mail'] : '';
	$username = isset($_POST['username']) ? $_POST['username'] : 'nope';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $response['mail'] = $email;
    $response['username'] = $username;
    $response['password'] = $password; 

    try {
        
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
		
		$sql = "select count(username) as sum from users where username='" . $username ."'";
		$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
		$row = mysqli_fetch_assoc($result);
		
		if($row['sum'] == 0){
				$sql = "insert into users (mail, username, password) VALUES ('" . $email  . "','" .$username ."', '". $password."')";
				$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
					// File successfully uploaded
        		$response['message'] = 'Prijava uspela!';
        		$response['error'] = false;
		}
		else {
				$response['message'] = 'Uporabnik ze obstaja!';
        		$response['error'] = true;			
		}
  
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