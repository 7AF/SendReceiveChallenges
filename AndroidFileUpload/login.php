<?php
 
// array for final json respone
$response = array();


 
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // reading other post parameters
	$username = isset($_POST['username']) ? $_POST['username'] : 'nope';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $response['username'] = $username;
    $response['password'] = $password; 

    try {
        
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
		
		$sql = "(select count(username) as sum from users where username='" . $username ."')";
		$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
		$row = mysqli_fetch_assoc($result);
		
		if($row['sum'] == 1){
				$sql = "(select username, password from users where username='". $username ."')";
				$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
				$row = mysqli_fetch_assoc($result);
				
				if($password == $row["password"]){	
	        		$response['message'] = 'Prijava uspela!';
    	    		$response['error'] = false;
				}
				else{
					$response['message'] = 'Geslo je napacno!';
    	    		$response['error'] = true;
				}
				
		}
		else {
				$response['message'] = 'Uporabnik ne obstaja!';
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