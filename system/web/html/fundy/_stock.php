<?php
$time_start = microtime ( true );
ini_set ( "memory_limit", "256M" );
set_time_limit ( 0 ); // to infinity for example
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');

include (dirname ( __FILE__ ) . '/simple_html_dom.php');

$symbol_google_array = sql_select_array ( "
		SELECT symbol_google FROM fundy._stock_exchanges 
		WHERE symbol_google IS NOT NULL 
		group by symbol_google;
" );

foreach ( $symbol_google_array as $element ) {
	$stock_exchanges_symbol = $element ['symbol_google'];
	
	mysqli_query ( 'USE fundy' );
	mysqli_query ( "CREATE TABLE 
					IF NOT EXISTS 
					fundy.`_stock_" . $stock_exchanges_symbol . "` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `company` varchar(100) NOT NULL,
				  `ticker_google` varchar(45) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`),
				  UNIQUE KEY `ticker_google_UNIQUE` (`ticker_google`)
				) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
				" );
	echo mysqli_errno ( $_MYSQLCONNECTION ) . ": " . mysqli_error ( $_MYSQLCONNECTION ) . "\n";
	
	$last = 0;
	$size = 500;
	
	for($i = 0; $i < 100; $i ++) {
		$ch = curl_init ( 'http://www.google.com/finance?restype=company&noIL=1&q=%5B%28exchange+%3D%3D+%22' . $stock_exchanges_symbol . '%22%29%5D' . '&start=' . $last . '&num=' . $size );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 0 );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 400 ); // timeout in seconds
		$curlResult = curl_exec ( $ch );
		// $curlResult = mb_convert_encoding ( $curlResult, 'utf-8', 'GBK,UTF-8,GB2312,ASCII' );
		echo $curlResult;
		
		$html = str_get_html ( $curlResult );
		$htmlArray = $html->find ( 'tr[class=snippet]' );
		if (count ( $htmlArray ) == 0) {
			$i = 1000;
		} else {
			foreach ( $html->find ( 'tr[class=snippet]' ) as $element ) {
				$snippet = str_get_html ( $element );
				$element2 = $snippet->find ( 'td[class=localName nwp] nobr' );
				$nobr = str_get_html ( $element2 [0] );
				$localName = $nobr->find ( 'a' );
				$company = $localName [0]->innertext;
				$company = str_replace ( ' ', '', $company );
				echo '<br>' . $company;
				
				$element3 = $snippet->find ( 'td[class=exch]' );
				$stock_exchanges_symbol_google = $element3 [0]->innertext;
				$stock_exchanges_symbol_google = str_replace ( ' ', '', $stock_exchanges_symbol_google );
				echo $stock_exchanges_symbol_google;
				
				$ticker_google = '';
				$element4 = $snippet->find ( 'td[class=symbol] nobr' );
				$nobr = str_get_html ( $element4 [0] );
				$symbol = $nobr->find ( 'a' );
				if (count ( $symbol ) > 0) {
					$ticker_google = $symbol [0]->innertext;
				} else {
					$ticker_google = $nobr;
				}
				$ticker_google = str_replace ( ' ', '', $ticker_google );
				$ticker_google = str_replace ( '</nobr>', '', $ticker_google );
				$ticker_google = str_replace ( '<nobr>', '', $ticker_google );
				echo $ticker_google;
				
				if (count ( sql_select_array ( "
				SELECT ID
				FROM `fundy`.`_stock_" . $stock_exchanges_symbol . "`
				WHERE ticker_google = '" . mysqli_real_escape_string ( $ticker_google ) . "'
				LIMIT 1
				" ) ) < 1) {
					
					echo ' ' . sql_insert_id ( "
				INSERT INTO `fundy`.`_stock_" . $stock_exchanges_symbol . "`
					(`company`, `ticker_google`)
				VALUES ('" . mysqli_real_escape_string ( $company ) . "',
					'" . mysqli_real_escape_string ( $stock_exchanges_symbol_google ) . ":" . mysqli_real_escape_string ( $ticker_google ) . "');
	 		 " );
				}

				echo "mysqli_errno: ";
				echo mysqli_errno ( $_MYSQLCONNECTION ) . mysqli_error ( $_MYSQLCONNECTION ) . "\n";
				
		}
		$last = $last + $size;
	}
}

echo (microtime ( true ) - $time_start);
?> 