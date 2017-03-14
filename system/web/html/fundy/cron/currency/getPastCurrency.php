<?php
$time_start = microtime ( true );
include (dirname ( __FILE__ ) . '/../../../.ba&4AhAF_mysql.php');
include (dirname ( __FILE__ ) . '/../../google/googleDocToken.php');

$array = sql_select_array ( "
		SELECT ticker_google AS 'ticker'
		FROM `fundy`.`currencies`
		" );

foreach ( $array as $item ) {
	$ticker = $item ["ticker"] . "HKD";
	echo $ticker;

	$spreadsheetId = '1G3a5Q8YuoUy5OuttriaXn6uCQ673JmFrY_r8h2ZUQbQ';
	$range = 'sheet1!A3:ZZ9999';
	$valueRange = new Google_Service_Sheets_BatchUpdateValuesRequest ( array (
			"valueInputOption" => "USER_ENTERED",
			"data" => array (
					"range" => $range,
					"majorDimension" => "ROWS",
					"values" => array (
							array (
									$ticker 
							) 
					) 
			) 
	) );
	
	$service->spreadsheets_values->batchUpdate ( $spreadsheetId, $valueRange );
	
	$range = 'sheet1!A7:ZZ9999';
	$response = $service->spreadsheets_values->get ( $spreadsheetId, $range );
	$values = $response->getValues ();
	
	if (count ( $values ) == 0) {
		print "No data found.<br>";
	} else {
		// echo json_encode ( $values, true );
		
		foreach ( $values as $row ) {
			
			insertTo ( $ticker, $row );
		}
	}
}
function insertTo($ticker, $row) {
	$iquery = "";
	$tradetime = "'#N/A'";
	$date = "";
	foreach ( $row as $col ) {
		if (strpos ( $col, '上午' ) !== false) {
			$col = str_replace ( "上午 ", "", $col ) . " AM";
			$date = str_replace ( "/", "_", substr ( $col, 0, 7 ) );
			$col = "STR_TO_DATE('" . $col . "','%Y/%m/%d %h:%i:%s %p')";
			$tradetime = $col;
		} else if (strpos ( $col, '下午' ) !== false) {
			$col = str_replace ( "下午 ", "", $col ) . " PM";
			$date = str_replace ( "/", "_", substr ( $col, 0, 7 ) );
			$col = "STR_TO_DATE('" . $col . "','%Y/%m/%d %h:%i:%s %p')";
			$tradetime = $col;
		} else if (strpos ( $col, ':' ) !== false) {
			$ticker = $col;
			$col = "'" . $col . "'";
		} else {
			$col = "'" . $col . "'";
		}
		
		$iquery = $iquery . "," . $col;
	}
	
	$cmd = "INSERT INTO `currency`.`" . $date . "`
				(`ticker_google`, `date`, `priceopen`,
				`high`, `low`, `price`,`volume`) VALUES 
	 		 ";
	$cmd = $cmd . "('" . $ticker . "'," . substr ( $iquery, 1 ) . "),";
	
	mysql_query ( "
				CREATE TABLE `currency`.`" . $date . "` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `ticker_google` varchar(45) NOT NULL,
				  `date` varchar(19) NOT NULL,
				  `priceopen` varchar(15) NOT NULL,
				  `high` varchar(15) NOT NULL,
				  `low` varchar(15) NOT NULL,
				  `price` varchar(15) NOT NULL,
				  `volume` varchar(15) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`),
				  KEY `ticker_google` (`ticker_google`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;
				" );
	
	if (count ( sql_select_array ( "
				SELECT ID
				FROM `currency`.`" . $date . "`
				WHERE ticker_google = '" . $ticker . "'
				AND date = '" . $tradetime . "'
				LIMIT 1
				" ) ) < 1) {
		echo $cmd;
		echo '<br>' . sql_insert_id ( substr ( $cmd, 0, - 1 ) );
		echo "mysql_errno: " . mysql_errno ( $_MYSQLCONNECTION ) . PHP_EOL;
	}
}

echo (microtime ( true ) - $time_start);
?>
