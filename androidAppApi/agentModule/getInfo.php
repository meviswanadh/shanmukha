<?php  
include_once('../connection.php');
$data = array();
$res = array();
$resp = array();
		
		$tsql2 = "select distinct(l.locationId),l.city from theater_movie_advance tma, theatres t, locations l where tma.theatreId = t.theatreId and t.locationId=l.locationId";  
		$stmt2 = sqlsrv_query( $conn, $tsql2);
		$locations = array();
			while( $row2 = sqlsrv_fetch_object($stmt2))  
			{  
			array_push($locations,$row2);
			}


		$tsql = "SELECT t.locationId,t.theatreId,e.exhibitorId,e.name FROM theatres t JOIN exhibitors e on t.exhibitorId = e.exhibitorId";  
		$stmt = sqlsrv_query( $conn, $tsql);  
		$result = array();
		if ( $stmt )  
		{  
			while( $row = sqlsrv_fetch_array($stmt))  
			{  
			array_push($data,$row);
			}

 //print_r($data);exit;

			// echo $data = json_encode($data); die;
			for ($i=0; $i <sizeof($data) ; $i++) { 
				$tsql1 = "SELECT  TOP 1 tma.theatreId as theatre_id,t.theatreName,m.movieId as movie_id,m.movieName FROM theater_movie_advance tma 
				INNER JOIN theatres t on tma.theatreId = t.theatreId 
				INNER JOIN movies m on tma.movieId = m.movieId 
				where tma.theatreId = ".$data[$i]['theatreId']." ORDER BY tma.theatreId";
				$stmt1 = sqlsrv_query( $conn, $tsql1);  
				$result = array();
				if ( $stmt1 )  
				{  
					while( $row1 = sqlsrv_fetch_object($stmt1))  
					{  
						$row1->exhibitor_id = $data[$i]['exhibitorId'];
						$row1->exhibitorName = $data[$i]['name'];
						$row1->locationId = $data[$i]['locationId'];
					array_push($res,$row1);
					}
				}
			}
			if (sizeof($res)>=1) { 
				// $result['status'] = 'Success';
				// echo json_encode($result);
			$resp['locations'] = $locations;
			$resp['data'] = $res;  
			$resp['status'] = 'Success';
			echo json_encode($resp);
			sqlsrv_free_stmt( $stmt);  
			sqlsrv_close( $conn);  
			}   	
			else{
			sqlsrv_free_stmt( $stmt);  
			sqlsrv_close( $conn);  
			$result['status'] = 'failed';
			$result['title'] = 'Error : ';	
			$result['subTitle'] = 'No Data found';		
			echo json_encode($result);  
			}
		}
		else   
		{  
		sqlsrv_free_stmt( $stmt);  
		sqlsrv_close( $conn);  
			$result['status'] = 'failed';
			$result['title'] = 'Error : ';		
			$result['subTitle'] = 'Error in statement execution.\n';
			echo json_encode($result);  
			die( print_r( sqlsrv_errors(), true));  
		}  

?> 