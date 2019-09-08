<?php  
include_once('../connection.php');
$content = trim(file_get_contents("php://input"));
$content = json_decode($content, true);
$result = array();
if (isset($content['show_id']) && isset($content['theatre_id']) && isset($content['show_date']) && isset($content['movie_id'])) 
{
	$showId = $content['show_id'];
	$theatreId = $content['theatre_id'];
	$movieId = $content['movie_id'];
	$exhibitorId = $content['exhibitor_id'];
	$showDate = $content['show_date'];

	$class1_tickets = $content['class1_tickets'];
	$class1_price = $content['class1_price'];
	$class1_price_gross = $content['class1_price'] * $content['class1_tickets'];
	$class1_price_net = $class1_price_gross;

	$class2_tickets = $content['class2_tickets'];
	$class2_price = $content['class2_price'];
	$class2_price_gross = $content['class2_price'] * $content['class2_tickets'];
	$class2_price_net = $class2_price_gross;

	$class3_tickets = $content['class3_tickets'];
	$class3_price = $content['class3_price'];
	$class3_price_gross = $content['class3_price'] * $content['class3_tickets'];
	$class3_price_net = $class3_price_gross;

	$class4_tickets = $content['class4_tickets'];
	$class4_price = $content['class4_price'];
	$class4_price_gross = $content['class4_price'] * $content['class4_tickets'];
	$class4_price_net = $class4_price_gross;

	$class5_tickets = $content['class5_tickets'];
	$class5_price = $content['class5_price'];
	$class5_price_gross = $content['class5_price'] * $content['class5_tickets'];
	$class5_price_net = $class5_price_gross;

	$class1_maintanance = $content['class1_tickets'] * 3;
	$class2_maintanance = $content['class2_tickets'] * 3;
	$class3_maintanance = $content['class3_tickets'] * 3;
	$class4_maintanance = $content['class4_tickets'] * 3;
	$class5_maintanance = $content['class5_tickets'] * 3;

	$totalTickets = $class1_tickets + $class2_tickets + $class3_tickets + $class4_tickets + $class5_tickets;

	$totalMaintanance = $class1_maintanance + $class2_maintanance + $class3_maintanance + $class4_maintanance + $class5_maintanance;

	$totalGrossAmount =  $class1_price_gross + $class2_price_gross + $class3_price_gross + $class4_price_gross + $class5_price_gross;

	$totalNetAmount = $totalGrossAmount;

	$taxAmount28 = 0;
	$taxAmount18 = 0;

	if (!is_null($content['show_id']) && !is_null($content['theatre_id']) && !is_null($content['movie_id']) && !is_null($content['show_date']) && !is_null($content['class1_tickets']) && !is_null($content['class1_price']) && !is_null($content['class2_tickets']) && !is_null($content['class2_price']) && !is_null($content['class3_tickets']) && !is_null($content['class3_price']) && !is_null($content['class4_tickets']) && !is_null($content['class4_price']) && !is_null($content['class5_tickets']) && !is_null($content['class5_price'])) {
		
		if ($showId<7) {

			// $class1_price_net = $class1_price_net + $class1_maintanance;
			// $class2_price_net = $class2_price_net + $class2_maintanance;
			// $class3_price_net = $class3_price_net + $class3_maintanance;
			// $class4_price_net = $class4_price_net + $class4_maintanance;
			// $class5_price_net = $class5_price_net + $class5_maintanance;
			// $class6_price_net = $class6_price_net + $class6_maintanance;

			// this is code is written by kasi viswanath
			// call me at 9505068780 ( India +91 )
			// mail me at skasiviswanad@gmail.com

			$taxTempAmount28 = 0;
			$taxTempAmount18 = 0;
			$class1_price_gross1 = ($class1_price > 100 ) ? $taxTempAmount28 = $class1_price_gross*28/128 :  $taxTempAmount18 = $class1_price_gross*18/118;
			$class1_price_net = $class1_price_gross - $taxTempAmount28 - $taxTempAmount18 - $class1_maintanance;
			$taxAmount28 = $taxTempAmount28;
			$taxAmount18 = $taxTempAmount18;

			$taxTempAmount28 = 0;
			$taxTempAmount18 = 0;
			$class2_price_gross1 = ($class2_price > 100 ) ? $taxTempAmount28 = $class2_price_gross*28/128 :  $taxTempAmount18 = $class2_price_gross*18/118;
			$class2_price_net = $class2_price_gross - $taxTempAmount28 - $taxTempAmount18 - $class2_maintanance;
			$taxAmount28 += $taxTempAmount28;
			$taxAmount18 += $taxTempAmount18;

			$taxTempAmount28 = 0;
			$taxTempAmount18 = 0;
			$class1_price_gross1 = ($class3_price > 100 ) ? $taxTempAmount28 = $class3_price_gross*28/128 :  $taxTempAmount18 = $class3_price_gross*18/118;
			$class3_price_net = $class3_price_gross - $taxTempAmount28 - $taxTempAmount18 - $class3_maintanance;
			$taxAmount28 += $taxTempAmount28;
			$taxAmount18 += $taxTempAmount18;

			$taxTempAmount28 = 0;
			$taxTempAmount18 = 0;
			$class1_price_gross1 = ($class4_price > 100 ) ? $taxTempAmount28 = $class4_price_gross*28/128 :  $taxTempAmount18 = $class4_price_gross*18/118;
			$class4_price_net = $class4_price_gross - $taxTempAmount28 - $taxTempAmount18 - $class4_maintanance;
			$taxAmount28 += $taxTempAmount28;
			$taxAmount18 += $taxTempAmount18;

			$taxTempAmount28 = 0;
			$taxTempAmount18 = 0;
			$class1_price_gross1 = ($class5_price > 100 ) ? $taxTempAmount28 = $class5_price_gross*28/128 :  $taxTempAmount18 = $taxTempAmount18 + $class5_price_gross*18/118;
			$class5_price_net = $class5_price_gross - $taxTempAmount28 - $taxTempAmount18 - $class5_maintanance;
			$taxAmount28 += $taxTempAmount28;
			$taxAmount18 += $taxTempAmount18;

			$totalNetAmount =  $class1_price_net + $class2_price_net + $class3_price_net + $class4_price_net + $class5_price_net;
		}

		$dat = array();
		$sql = "select infoId from showsInfo where showDate ='".$showDate."' and theatreId = ".$theatreId." and movieId = ".$movieId." and showId = ".$showId; 
		$smt = sqlsrv_query($conn, $sql); 
		while( $r = sqlsrv_fetch_object($smt))  
			{  
			array_push($dat,$r);
			}

			if (sizeof($dat)==0) {
			$tsql = "INSERT INTO showsInfo (showId, theatreId, movieId, exhibitorId, showDate, class1_tickets, class1_price, class2_tickets, class2_price, class3_tickets, class3_price, class4_tickets, class4_price, class5_tickets, class5_price, showTotalNetAmount, showTotalGrossAmount18, showTotalGrossAmount28, showMaintanance, showTotalGrossAmount)
			 VALUES (".$showId.",".$theatreId.",".$movieId.",".$exhibitorId.",'".$showDate."',".$class1_tickets.",".$class1_price.",".$class2_tickets.",".$class2_price.",".$class3_tickets.",".$class3_price.",".$class4_tickets.",".$class4_price.",".$class5_tickets.",".$class5_price.",".$totalNetAmount.",".$taxAmount18.",".$taxAmount28.",".$totalMaintanance.",".$totalGrossAmount.")";

			}

			else if (isset($content['update']) && $content['update'] == 'yes') {
					$v = json_encode($dat[0]);
					$v = json_decode($v, true);
					$infoId = $v['infoId'];
				$tsql = "UPDATE showsInfo set class1_tickets = ".$class1_tickets.",class1_price = ".$class1_price.",class2_tickets = ".$class2_tickets.",class2_price = ".$class2_price.",class3_tickets = ".$class3_tickets.",class3_price = ".$class3_price.",class4_tickets = ".$class4_tickets.",class4_price = ".$class4_price.",class5_tickets = ".$class5_tickets.",class5_price = ".$class5_price.",showTotalNetAmount = ".$totalNetAmount.",showTotalGrossAmount18 = ".$taxAmount18.",showTotalGrossAmount28 = ".$taxAmount28.",showMaintanance = ".$totalMaintanance.",showTotalGrossAmount = ".$totalGrossAmount." where infoId = ".$infoId;
			}
			else {
			$result['status'] = 'Update';
			$result['title'] = 'Error : ';
			$result['subTitle'] = 'Do you want to update the show data';
			echo json_encode($result);  
			exit;
			}


		$stmt = sqlsrv_query($conn, $tsql);  
		$data = array();
		$data1 = array();
		if ( $stmt )  
		{  
		sqlsrv_free_stmt( $stmt);  

		$tsql1 = "select id from dayWiseAmounts where showDate ='".$showDate."' and theatreId = ".$theatreId." and movieId = ".$movieId;
		$stmt1 = sqlsrv_query($conn, $tsql1);  

		if ( $stmt1 )  
		{  
			while( $row1 = sqlsrv_fetch_object($stmt1))  
			{  
			array_push($data1,$row1);
			}

				$showTotalNetAmountKey = 'show'.$showId.'TotalNetAmount';
				$showTotalNetAmountValue = $totalNetAmount;

				$showTotalGrossAmount18Key = 'show'.$showId.'TotalGrossAmount18';
				$showTotalGrossAmount18Value = $taxAmount18;

				$showTotalGrossAmount28Key = 'show'.$showId.'TotalGrossAmount28';
				$showTotalGrossAmount28Value = $taxAmount28;

				$showTicketsKey = 'show'.$showId.'Tickets';
				$showTicketsValue = $totalTickets;

				$showMaintananceKey = 'show'.$showId.'Maintanance';
				$showTotalGrossAmountKey = 'show'.$showId.'TotalGrossAmount';

				sqlsrv_free_stmt( $stmt1); 
			if (sizeof($data1)>=1) {

				//$val = $data1;
				//$val = $val['id'];
				$val = json_encode($data1[0]);
				$vall = json_decode($val, true);
				$id = $vall['id'];

				$tsql3 = "UPDATE dayWiseAmounts SET ".$showTotalNetAmountKey."=".$showTotalNetAmountValue.",".$showTotalGrossAmount18Key."=".$showTotalGrossAmount18Value.",".$showTotalGrossAmount28Key."=".$showTotalGrossAmount28Value.", ".$showTicketsKey." = ".$showTicketsValue.", ".$showMaintananceKey." = ".$totalMaintanance.", ".$showTotalGrossAmountKey." = ".$totalGrossAmount." WHERE id = ".$id;
				$stmt3 = sqlsrv_query($conn, $tsql3); 
				sqlsrv_free_stmt( $stmt3); 
			$result['status'] = 'Success';
			$result['title'] = 'Success : ';
			$result['subTitle'] = 'record added successfully';
			echo json_encode($result);  
			}
			// insert
			else{

				$tsql2 = "INSERT INTO dayWiseAmounts (".$showTotalNetAmountKey.",".$showTotalGrossAmount18Key.",".$showTotalGrossAmount28Key.",showDate, theatreId, movieId, exhibitorId,".$showTicketsKey.",".$showMaintananceKey.",".$showTotalGrossAmountKey.") VALUES (".$showTotalNetAmountValue.",".$showTotalGrossAmount18Value.",".$showTotalGrossAmount28Value.",'".$showDate."',".$theatreId.",".$movieId.",".$exhibitorId.",".$showTicketsValue.",".$totalMaintanance.",".$totalGrossAmount.")";
				$stmt2 = sqlsrv_query($conn, $tsql2);
			$result['status'] = 'Success';
			$result['title'] = 'Success : ';
			$result['subTitle'] = 'record added successfully';
			echo json_encode($result);  
			}
			sqlsrv_close( $conn);  
		}


		}
		else   
		{  
			sqlsrv_free_stmt( $stmt);  
			sqlsrv_close( $conn);  
			$result['status'] = 'failed';
			$result['title'] = 'Error : ';
			$result['subTitle'] = 'faild to insert';
			echo json_encode($result);  
			die( print_r( sqlsrv_errors(), true));  
		}  
	}
	else
	{
		$result['status'] = 'failed';
		$result['title'] = 'Error : ';
		$result['subTitle'] = 'Invalid data';
		echo json_encode($result);  
	}
}
else{
	$result['status'] = 'failed';
	$result['title'] = 'Error : ';
	$result['subTitle'] = 'Invalid input params';
	echo json_encode($result);  
	}
?> 