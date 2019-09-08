<?php  
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');
$t = array('session' => time());
// $data = array();
// array_push($data,$t);
//$t['session'] = time();
echo json_encode($t);
?>