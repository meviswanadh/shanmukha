<?php
header("Access-Control-Allow-Origin: *");  
//header('Access-Control-Allow-Origin: *');
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//header('Access-Control-Allow-Methods: GET, POST, PUT');

include_once('../connection.php');

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));
$content = json_decode($content, true);
// $entityBody['mobile'] = $content->mobile;
// $entityBody['password'] = $content->password;
//Attempt to decode the incoming RAW post data from JSON.
//$entityBody = json_decode($content, true);
 print_r($content); exit;

if (isset($content['mobile']) && isset($content['password'])) 
{
	$mobile = $content['mobile'];
	$password = md5($content['password']);
	if (strlen((string)$mobile) == 10) 
	{
		echo $tsql = "SELECT userId as authKey FROM agents where mobile = ".$mobile." and  password = '".$password."'";  
		exit;
		$stmt = sqlsrv_query($conn, $tsql);  
		$data = array();
		$result = array();
		if ( $stmt )  
		{  
			while( $row = sqlsrv_fetch_object($stmt))  
			{  
			if (sizeof($row)>=1) {
			array_push($data,$row);
			}
			}
			if (sizeof($data)==1) {
			$result['data'] = $data;
			$result['status'] = 'Success';
				echo json_encode($result);
			//$data = json_encode($data);
			//echo $data;
			sqlsrv_free_stmt( $stmt);  
			sqlsrv_close( $conn);  
			}   	
			else{
			$result['status'] = 'failed';
			$result['title'] = 'No login found : ';
			$result['subTitle'] = 'Please check your mobile number and password';
			echo json_encode($result);  
			}
		}
		else   
		{  
		// sqlsrv_free_stmt( $stmt);  
		sqlsrv_close( $conn);  
			$result['status'] = 'failed';
			$result['title'] = 'Error : ';	
			$result['subTitle'] = 'Server Error';		
				echo json_encode($result);  
			// die( print_r( sqlsrv_errors(), true));  
		}  
	}
	else
	{
		$result['status'] = 'failed';
		$result['title'] = 'Invalid input : ';	
		$result['subTitle'] = 'Please provide 10 digit registered mobile number and password';	
		echo json_encode($result);  
	}
}
else{
	$result['status'] = 'Server Error';
	echo json_encode($result);  
	}
?> 