<?php
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');
include ('simple_html_dom.php');

mysql_query ( 'USE fundy' );
mysql_query ( "
				CREATE TABLE IF NOT EXISTS  `gold_" . date ( "Y_m_d" ) . "` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `price` varchar(45) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;
				" );

$ch = curl_init ( 'http://www.pmbull.com/gold-price/' );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
$curlResult = curl_exec ( $ch );
// echo $curlResult;

$html = str_get_html ( $curlResult );
foreach ( $html->find ( 'div[id=gold_spot_3] b span' ) as $element ) {
	// echo $element->innertext;
	
	echo sql_insert_id ( "
			INSERT INTO `fundy`.`gold_" . date ( "Y_m_d" ) . "` 
			(`price`) 
			VALUES ('" . ($element->innertext) . "');
		" );
	
	echo "mysql_errno: ";
	echo mysql_errno ( $_MYSQLCONNECTION ) . mysql_error ( $_MYSQLCONNECTION ) . "\n";
}

?>