<?php
$time_start = microtime ( true );
include (dirname ( __FILE__ ) . '/../../../.ba&4AhAF_mysql.php');
include (dirname ( __FILE__ ) . '/../../google/googleDocToken.php');

$array = array ();

// for cmd test
if (! isset ( $_GET ['SID'] )) {
	$SID = '1IeflNPNSikGe7xq4T4mvkiK_jUOxjDEymolXzU8Iqn4';
} else {
	$SID = $_GET ['SID'];
}

$spreadsheetId = $SID;
$range = 'sheet1!A1:ZZ9999';

$response = $service->spreadsheets_values->get ( $spreadsheetId, $range );
$values = $response->getValues ();

if (count ( $values ) == 0) {
	print "No data found.<br>";
} else {
	// echo json_encode ( $values, true );
	
	for($i = 0; $i < count ( $values ); $i ++) {
		$iquery = "";
		$row = $values [$i];
		if ($row [1] == "HKD") {
			mysql_query ( "
				CREATE TABLE IF NOT EXISTS `currency`.`" . $row [1] . "_" . $_YMD . "` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `currency` varchar(45) NOT NULL,
				  `price` varchar(45) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`),
				  KEY `currency` (`currency`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;
				" );
			
			for($ii = 2; $ii < count ( $row ); $ii ++) {
				
				$col = "'" . $row [$ii] . "'";
				
				$iquery = $col;
				
				$currency = $values [1] [$ii];
				
				$price = $row [$ii];
				
				$cmd = "INSERT INTO `currency`.`" . $row [1] . "_" . $_YMD . "`
				(`currency`, `price`) VALUES ";
				$cmd = $cmd . "('" . $currency . "','" . substr ( $iquery, 1 ) . "),";
				
				if (count ( sql_select_array ( "
					  SELECT ID
					  FROM `currency`.`" . $row [1] . "_" . $_YMD . "`
					  WHERE currency = '" . $currency . "'
					  AND price = '" . $price . "' 
					  AND create_datetime > DATE_ADD(NOW(), INTERVAL -30 SECOND)
					  LIMIT 1
					  " ) ) < 1) {
					echo $cmd;
					echo '<br>' . sql_insert_id ( substr ( $cmd, 0, - 1 ) );
					echo "mysql_errno: " . mysql_error ( $_MYSQLCONNECTION ) . PHP_EOL;
				}
			}
		}
	}
}

echo (microtime ( true ) - $time_start);
?>
