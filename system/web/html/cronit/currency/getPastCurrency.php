<?php
include_once __DIR__ . "/../allautoload.php";

$loadtime = new LoadTime ();

$db = Database::get ();
$array = $db->select ( "
		ticker_google AS 'ticker'
		FROM `fundy`.`currencies`
		" );

$service = GoogleSheet::get ();
$spreadsheetId = '1G3a5Q8YuoUy5OuttriaXn6uCQ673JmFrY_r8h2ZUQbQ';
foreach ( $array as $item ) {
	$ticker = $item->ticker . "HKD";
	echo $ticker;

	$range = 'sheet1!A3';
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
	$aa = $service->spreadsheets_values->batchUpdate ( $spreadsheetId, $valueRange );

	$range = 'sheet1!A1:F9999';
	$response = $service->spreadsheets_values->get ( $spreadsheetId, $range );
	$values = $response->getValues ();

	if (count ( $values ) == 0) {
		print "No data found.<br>";
	} else {
		foreach ( $values as $row ) {
			insertTo ( $ticker, $row );
		}
	}
}
function insertTo($ticker, $row) {
	global $db;
	$iquery = "";
	$tradetime = "'#N/A'";
	$date = "";
	foreach ( $row as $col ) {
		if ('#N/A' === $col) {
		} else {
			echo $col . PHP_EOL;
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
	}
	if ($date != '') {
		echo "CREATE TABLE `currency`.`" . $date . "` (
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
				";

		$db->raw ( "CREATE TABLE `currency`.`" . $date . "` (
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

		$rows = $db->select ( "ID
				FROM `currency`.`" . $date . "`
				WHERE ticker_google = :ticker_google
				AND date = " . $tradetime . "
				LIMIT 1", array (
						"ticker_google" => $ticker
				) );
		if (count ( $rows ) < 1) {
			$cmd = "INSERT INTO `currency`.`" . $date . "`
				(`ticker_google`, `date`, `priceopen`,
				`high`, `low`, `price`,`volume`) VALUES
	 		 	('" . $ticker . "'," . substr ( $iquery, 1 ) . ")";
				
			echo $cmd;
			$db->raw ( $cmd );
		}
	}
}
?>
