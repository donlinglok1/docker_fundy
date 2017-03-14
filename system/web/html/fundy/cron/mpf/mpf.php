<?php
$time_start = microtime ( true );
include (dirname ( __FILE__ ) . '/../../../.ba&4AhAF_mysql.php');
include (dirname ( __FILE__ ) . '/../../google/googleDocToken.php');

mysql_query ( "CREATE TABLE IF NOT EXISTS `mpf`.`" . $_YMD . "` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `ticker_google` varchar(45) NOT NULL,
				  `morningstarrating` varchar(15) NOT NULL,
				  `price` varchar(15) NOT NULL,
				  `closeyest` varchar(15) NOT NULL,
				  `change` varchar(15) NOT NULL,
				  `changepect` varchar(15) NOT NULL,
				  `returnytd` varchar(14) NOT NULL,
				  `returnday` varchar(14) NOT NULL,
				  `return1` varchar(14) NOT NULL,
				  `return4` varchar(14) NOT NULL,
				  `return13` varchar(14) NOT NULL,
				  `return52` varchar(14) NOT NULL,
				  `return156` varchar(14) NOT NULL,
				  `return260` varchar(14) NOT NULL,
				  `expenseratio` varchar(100) NOT NULL,
				  `date` varchar(19) NOT NULL,
				  `yieldpct` varchar(12) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`),
				  KEY `ticker_google` (`ticker_google`)
				) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
				" );

$spreadsheetId = '1HlAK-2ICLM2uoBR9xkC5hGWplxeBQ1FyflPXeNowO6w';
$range = 'sheet1!B3:ZZ9999';

$response = $service->spreadsheets_values->get ( $spreadsheetId, $range );
$values = $response->getValues ();

if (count ( $values ) == 0) {
	print "No data found.<br>";
} else {
	// echo json_encode ( $values, true );
	
	$cmd = "INSERT INTO `mpf`.`" . $_YMD . "`
			(`ticker_google`, `morningstarrating`, `price`,
			`closeyest`, `change`, `changepect`, `returnytd`,
			`returnday`, `return1`, `return4`, `return13`,
			`return52`, `return156`, `return260`, `expenseratio`,
			`date`, `yieldpct`) VALUES  ";
	
	foreach ( $values as $row ) {
		$cmd = $cmd . insertTo ( $row );
	}
	
	echo substr ( $cmd, 0, - 1 );
	echo '<br>' . sql_insert_id ( substr ( $cmd, 0, - 1 ) );
	echo "mysql_errno: " . mysql_error ( $_MYSQLCONNECTION ) . PHP_EOL;
}
function insertTo($row) {
	$iquery = "";
	$ticker = "";
	$tradetime = "'#N/A'";
	$cmd = "";
	
	foreach ( $row as $col ) {
		if (strpos ( $col, '上午' ) !== false) {
			$col = str_replace ( "上午 ", "", $col ) . " AM";
			$col = "STR_TO_DATE('" . $col . "','%Y/%m/%d %h:%i:%s %p')";
			$tradetime = $col;
		} else if (strpos ( $col, '下午' ) !== false) {
			$col = str_replace ( "下午 ", "", $col ) . " PM";
			$col = "STR_TO_DATE('" . $col . "','%Y/%m/%d %h:%i:%s %p')";
			$tradetime = $col;
		} else if (strpos ( $col, ':' ) !== false) {
			$ticker = $col;
			$col = "'" . $col . "'";
		} else {
			$col = "'" . mysql_real_escape_string($col) . "'";
		}
		
		$iquery = $iquery . "," . $col;
	}
	
	if (count ( sql_select_array ( "
				SELECT ID
				FROM `mpf`.'" . $_YMD . "'
				WHERE ticker_google = '" . $ticker . "'
				AND date = '" . $tradetime . "'
				LIMIT 1
				" ) ) < 1) {
		
		$cmd = $cmd . "(" . substr ( $iquery, 1 ) . "),";
		echo $cmd;
	}
	
	return $cmd;
}

echo (microtime ( true ) - $time_start);
?>
