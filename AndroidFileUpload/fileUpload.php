<?php
 
// Path to move uploaded files
$target_path = "uploads/";
 
// array for final json respone
$response = array();
 
// getting server ip address
$server_ip = gethostbyname(gethostname());
 
// final file url that is being uploaded
$file_upload_url = 'http://' . $server_ip . '/' . 'AndroidFileUpload' . '/' . $target_path;
 
 
if (isset($_FILES['image']['name'])) {
    $target_path = $target_path . basename($_FILES['image']['name']);
 
    // reading other post parameters
    $id = isset($_POST['id']) ? $_POST['id'] : '';
   
 
    // basename($_FILES['image']['name']);

 
    try {
        // Throws exception incase file is not being moved
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            // make error flag true
            $response['error'] = true;
            $response['message'] = 'Datoteke nisem mogel premakniti!';
        }
 
   
        
		$connection = mysqli_connect("localhost","root","sonce","sh6004_challengeme") or die("Error " . mysqli_error($connection));
	
		$sql = "UPDATE challengeme SET challenge=1, path='".basename($_FILES['image']['name'])."' WHERE id=".$id."; ";
		$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
		
	
		     // File successfully uploaded
        $response['message'] = 'Video je naložen uspešno!';
        $response['error'] = false;	
		
    } catch (Exception $e) {
        // Exception occurred. Make error flag true
        $response['error'] = true;
        $response['message'] = $e->getMessage();
    }
} else {
    // File parameter is missing
    $response['error'] = true;
    $response['message'] = 'Nisem prejel nobene datoteke!';
}
 
// Echo final json response to client
echo json_encode($response);
?>