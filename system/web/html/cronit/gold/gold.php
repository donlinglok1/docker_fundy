<?php
include_once __DIR__ . "/../autoload.php";

$mysql = new MySQL ();
$mysql->query ( "
				CREATE TABLE IF NOT EXISTS  gold.`" . YMD . "` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `price` varchar(45) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;
				" );

$curl = new CURL ();
$curlResult = $curl->get ( 'http://www.pmbull.com/gold-price/' );
// echo $curlResult;

$mysql = new MySQL ();
$htmldom = new HTMLDom ();

$html = $htmldom->str_get_html ( $curlResult );
foreach ( $html->find ( 'div[id=gold_spot_3] b span' ) as $element ) {
	// echo $element->innertext;
	
	echo $mysql->insert ( "
			INSERT INTO `gold`.`" . YMD . "` 
			(`price`) 
			VALUES ('" . ($element->innertext) . "');
		" );
}

?>