<?php
ini_set ( "memory_limit", "256M" );
set_time_limit ( 0 ); // to infinity for example
$time_start = microtime ( true );

include (dirname ( __FILE__ ) . '/../../../.ba&4AhAF_mysql.php');
include (dirname ( __FILE__ ) . '/../../simple_html_dom.php');

mysql_query ( "
				CREATE TABLE
				IF NOT EXISTS `fundy`.`mpfs` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `company` varchar(100) NOT NULL,
				  `ticker_google` varchar(45) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`),
				  UNIQUE KEY `ticker_google_UNIQUE` (`ticker_google`)
				) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
				" );
echo mysql_errno ( $_MYSQLCONNECTION ) . PHP_EOL;

$stock_exchanges_symbol = 'MUTF_HK';
$last = 0;
$size = 500;

for($i = 0; $i < 100; $i ++) {
	$ch = curl_init ( 'http://www.google.com/finance?restype=mutualfund&noIL=1&q=%5B%28exchange+%3D%3D+%22' . $stock_exchanges_symbol . '%22%29%5D' . '&start=' . $last . '&num=' . $size );
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
			$element2 = $snippet->find ( 'td[class=localName] nobr' );
			$nobr = str_get_html ( $element2 [0] );
			$localName = $nobr->find ( 'a' );
			$company = $localName [0]->innertext;
			//$company = str_replace ( ' ', '', $company );
			echo '<br>' . $company;
				
			$stock_exchanges_symbol_google = "MUTF_HK";
			echo $stock_exchanges_symbol_google;
				
			$ticker_google = '';
			$element4 = $snippet->find ( 'td[class=symbol]' );
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
				FROM `fundy`.`mpfs`
				WHERE ticker_google = '" . mysql_real_escape_string ( $ticker_google ) . "'
				LIMIT 1
				" ) ) < 1) {

				echo sql_insert_id ( "
				INSERT INTO `fundy`.`mpfs` (`company`, `ticker_google`)
				VALUES ('" . mysql_real_escape_string ( $company ) . "',
					'" . mysql_real_escape_string ( $stock_exchanges_symbol_google ) . ":" . mysql_real_escape_string ( $ticker_google ) . "');
	 		 " );
			}
				
			echo "mysql_errno: " . mysql_errno ( $_MYSQLCONNECTION ) . PHP_EOL;
		}
	}
	$last = $last + $size;
}

echo (microtime ( true ) - $time_start);
?>