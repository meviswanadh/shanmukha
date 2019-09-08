<?php  
include_once('../connection.php');
$tsql = "SELECT * FROM showsInfo";  
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
		<th>infoId</th>
		<th>showId</th>
		<th>movieId</th>
		<th>exhibitorId</th>
		<th>showDate</th>
		<th>class1_tickets</th>
		<th>class2_tickets</th>
		<th>class3_tickets</th>
		<th>class4_tickets</th>
		<th>class5_tickets</th>
		<th>class1_price</th>
		<th>class2_price</th>
		<th>class3_price</th>
		<th>class4_price</th>
		<th>class5_price</th>
		<th>showTotalNetAmount</th>
		<th>showTotalGrossAmount18</th>
		<th>showTotalGrossAmount28</th>
		<th>showMaintanance</th>
		<th>showTotalGrossAmount</th>
	</thead>
	<tbody>
		
<?php
while( $row = sqlsrv_fetch_object( $stmt))  
{  
	echo "<tr>";
	echo "<td>".$row->infoId."</td>";
	echo "<td>".$row->showId."</td>";
	echo "<td>".$row->movieId."</td>";
	echo "<td>".$row->exhibitorId."</td>";
	echo "<td>".$row->showDate."</td>";
	echo "<td>".$row->class1_tickets."</td>";
	echo "<td>".$row->class2_tickets."</td>";
	echo "<td>".$row->class3_tickets."</td>";
	echo "<td>".$row->class4_tickets."</td>";
	echo "<td>".$row->class5_tickets."</td>";
	echo "<td>".$row->class1_price."</td>";
	echo "<td>".$row->class2_price."</td>";
	echo "<td>".$row->class3_price."</td>";
	echo "<td>".$row->class4_price."</td>";
	echo "<td>".$row->class5_price."</td>";
	echo "<td>".$row->showTotalNetAmount."</td>";
	echo "<td>".$row->showTotalGrossAmount18."</td>";
	echo "<td>".$row->showTotalGrossAmount28."</td>";
	echo "<td>".$row->showMaintanance."</td>";
	echo "<td>".$row->showTotalGrossAmount."</td>";
	echo "</tr>";
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