<?php
include_once __DIR__ . "/../allautoload.php";

$loadtime = new LoadTime ();

$db = Database::get ();
$db->raw ( "CREATE TABLE IF NOT EXISTS  `gold`.`" . YMD . "` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		`price` varchar(45) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY `id_UNIQUE` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		" );

$curlResult = CURL::get ( 'http://www.pmbull.com/gold-price/' );

$htmldom = new HTMLDom ();
$html = $htmldom->str_get_html ( $curlResult );
$array = $html->find ( 'div[id=gold_spot_3] b span' );
foreach ( $array as $element ) {
	echo $db->insert ( '`gold`.`' . YMD . '`', array (
			'price' => ($element->innertext)
	) );
}

?>