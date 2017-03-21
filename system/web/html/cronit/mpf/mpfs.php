<?php
ini_set ( "memory_limit", "256M" );
set_time_limit ( 0 ); // to infinity for example

include_once __DIR__ . "/../allautoload.php";

$loadtime = new LoadTime ();

$db = Database::get ();
$db->raw ( "CREATE TABLE IF NOT EXISTS `fundy`.`mpfs` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		`company` varchar(100) NOT NULL,
		`ticker_google` varchar(45) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY `id_UNIQUE` (`id`),
		UNIQUE KEY `ticker_google_UNIQUE` (`ticker_google`)
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
		" );

$stock_exchanges_symbol = 'MUTF_HK';
$last = 0;
$size = 500;
$curl = new CURL ();
$htmldom = new HTMLDom ();
for($i = 0; $i < 100; $i ++) {
	$curlResult = $curl->get ( 'http://www.google.com/finance?restype=mutualfund&noIL=1&q=%5B%28exchange+%3D%3D+%22' . $stock_exchanges_symbol . '%22%29%5D' . '&start=' . $last . '&num=' . $size );
	
	$html = $htmldom->str_get_html ( $curlResult );
	$htmlArray = $html->find ( 'tr[class=snippet]' );
	if (count ( $htmlArray ) == 0) {
		$i = 1000;
	} else {
		foreach ( $html->find ( 'tr[class=snippet]' ) as $element ) {
			parseHTML ( $element );
		}
	}
	$last = $last + $size;
}
function parseHTML($element) {
	global $htmldom;
	$snippet = $htmldom->str_get_html ( $element );
	
	$element2 = $snippet->find ( 'td[class=localName] nobr' );
	$nobr = $htmldom->str_get_html ( $element2 [0] );
	$localName = $nobr->find ( 'a' );
	$company = $localName [0]->innertext;
	$company = str_replace ( '&#8211;', '-', $company );
	
	$stock_exchanges_symbol_google = "MUTF_HK";
	
	$element4 = $snippet->find ( 'td[class=symbol]' );
	$nobr = $htmldom->str_get_html ( $element4 [0] );
	$symbol = $nobr->find ( 'a' );
	if (count ( $symbol ) > 0) {
		$ticker_google = $symbol [0]->innertext;
	} else {
		$ticker_google = $nobr;
	}
	$ticker_google = str_replace ( '</nobr>', '', $ticker_google );
	$ticker_google = str_replace ( '<nobr>', '', $ticker_google );
	
	global $db;
	echo $db->insertIfNew ( '`fundy`.`mpfs`', array (
			'company' => $company,
			'ticker_google' => $stock_exchanges_symbol_google . ":" . $ticker_google 
	) );
}
?>