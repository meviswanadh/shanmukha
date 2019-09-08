<?php  
include_once('../connection.php');
$tsql = "SELECT * FROM dayWiseAmounts";  
$stmt = sqlsrv_query( $conn, $tsql);  
// if ( $stmt )  
// {  
?>
<!DOCTYPE html>
<html>
<head>
	<title>showsInfo Page</title>
</head>
<body>
<table border="1">
	<thead>
		<th>id</th>
		<th>showDate</th>
		<th>theatreId</th>
		<th>movieId</th>
		<th>exhibitorId</th>
		<th>show1Tickets</th>
		<th>show1Maintanance</th>
		<th>show1TotalNetAmount</th>
		<th>show1TotalGrossAmount18</th>
		<th>show1TotalGrossAmount28</th>
		<th>show1TotalGrossAmount</th>
		<th>show2Tickets</th>
		<th>show2Maintanance</th>
		<th>show2TotalNetAmount</th>
		<th>show2TotalGrossAmount18</th>
		<th>show2TotalGrossAmount28</th>
		<th>show2TotalGrossAmount</th>
		<th>show3Tickets</th>
		<th>show3Maintanance</th>
		<th>show3TotalNetAmount</th>
		<th>show3TotalGrossAmount18</th>
		<th>show3TotalGrossAmount28</th>
		<th>show3TotalGrossAmount</th>
		<th>show4Tickets</th>
		<th>show4Maintanance</th>
		<th>show4TotalNetAmount</th>
		<th>show4TotalGrossAmount18</th>
		<th>show4TotalGrossAmount28</th>
		<th>show4TotalGrossAmount</th>
		<th>show5Tickets</th>
		<th>show5Maintanance</th>
		<th>show5TotalNetAmount</th>
		<th>show5TotalGrossAmount18</th>
		<th>show5TotalGrossAmount28</th>
		<th>show5TotalGrossAmount</th>
		<th>show6Tickets</th>
		<th>show6Maintanance</th>
		<th>show6TotalNetAmount</th>
		<th>show6TotalGrossAmount18</th>
		<th>show6TotalGrossAmount28</th>
		<th>show6TotalGrossAmount</th>
		<th>show7Tickets</th>
		<th>show7Maintanance</th>
		<th>show7TotalNetAmount</th>
		<th>show7TotalGrossAmount18</th>
		<th>show7TotalGrossAmount28</th>
		<th>show7TotalGrossAmount</th>
		<th>show8Tickets</th>
		<th>show8Maintanance</th>
		<th>show8TotalNetAmount</th>
		<th>show8TotalGrossAmount18</th>
		<th>show8TotalGrossAmount28</th>
		<th>show8TotalGrossAmount</th>

	</thead>
	<tbody>
		
<?php
while( $row = sqlsrv_fetch_object( $stmt))  
{  
	echo "<tr>";
	echo "<td>".$row->id."</td>";
	echo "<td>".$row->showDate."</td>";
	echo "<td>".$row->theatreId."</td>";
	echo "<td>".$row->movieId."</td>";
	echo "<td>".$row->exhibitorId."</td>";
	echo "<td>".$row->show1Tickets."</td>";
	echo "<td>".$row->show1Maintanance."</td>";
	echo "<td>".$row->show1TotalNetAmount."</td>";
	echo "<td>".$row->show1TotalGrossAmount18."</td>";
	echo "<td>".$row->show1TotalGrossAmount28."</td>";
	echo "<td>".$row->show1TotalGrossAmount."</td>";
	echo "<td>".$row->show2Tickets."</td>";
	echo "<td>".$row->show2Maintanance."</td>";
	echo "<td>".$row->show2TotalNetAmount."</td>";
	echo "<td>".$row->show2TotalGrossAmount18."</td>";
	echo "<td>".$row->show2TotalGrossAmount28."</td>";
	echo "<td>".$row->show2TotalGrossAmount."</td>";
	echo "<td>".$row->show3Tickets."</td>";
	echo "<td>".$row->show3Maintanance."</td>";
	echo "<td>".$row->show3TotalNetAmount."</td>";
	echo "<td>".$row->show3TotalGrossAmount18."</td>";
	echo "<td>".$row->show3TotalGrossAmount28."</td>";
	echo "<td>".$row->show3TotalGrossAmount."</td>";
	echo "<td>".$row->show4Tickets."</td>";
	echo "<td>".$row->show4Maintanance."</td>";
	echo "<td>".$row->show4TotalNetAmount."</td>";
	echo "<td>".$row->show4TotalGrossAmount18."</td>";
	echo "<td>".$row->show4TotalGrossAmount28."</td>";
	echo "<td>".$row->show4TotalGrossAmount."</td>";
	echo "<td>".$row->show5Tickets."</td>";
	echo "<td>".$row->show5Maintanance."</td>";
	echo "<td>".$row->show5TotalNetAmount."</td>";
	echo "<td>".$row->show5TotalGrossAmount18."</td>";
	echo "<td>".$row->show5TotalGrossAmount28."</td>";
	echo "<td>".$row->show5TotalGrossAmount."</td>";
	echo "<td>".$row->show6Tickets."</td>";
	echo "<td>".$row->show6Maintanance."</td>";
	echo "<td>".$row->show6TotalNetAmount."</td>";
	echo "<td>".$row->show6TotalGrossAmount18."</td>";
	echo "<td>".$row->show6TotalGrossAmount28."</td>";
	echo "<td>".$row->show6TotalGrossAmount."</td>";
	echo "<td>".$row->show7Tickets."</td>";
	echo "<td>".$row->show7Maintanance."</td>";
	echo "<td>".$row->show7TotalNetAmount."</td>";
	echo "<td>".$row->show7TotalGrossAmount18."</td>";
	echo "<td>".$row->show7TotalGrossAmount28."</td>";
	echo "<td>".$row->show7TotalGrossAmount."</td>";
	echo "<td>".$row->show8Tickets."</td>";
	echo "<td>".$row->show8Maintanance."</td>";
	echo "<td>".$row->show8TotalNetAmount."</td>";
	echo "<td>".$row->show8TotalGrossAmount18."</td>";
	echo "<td>".$row->show8TotalGrossAmount28."</td>";
	echo "<td>".$row->show8TotalGrossAmount."</td>";
	echo "</tr>";
	// print_r($row);
	// exit;
	// array_push($data,$row);
}  
// $data = json_encode($data);
// echo $data;
// }   
// else   
// {  
//      echo "Error in statement execution.\n";  
//      die( print_r( sqlsrv_errors(), true));  
// }  
sqlsrv_free_stmt( $stmt);  
sqlsrv_close( $conn);  
?> 
</tbody>
</table>
</body>
</html>