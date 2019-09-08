<?php
$serverName = "184.168.194.64"; 
$uid = "shanmukhaMovUsr";   
$pwd = "shanmukhaMoviePassword123!@#";  
$databaseName = "shanmukhaMovieDb"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  
?>