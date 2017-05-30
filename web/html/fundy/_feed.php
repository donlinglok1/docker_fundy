<?php
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');
include (dirname ( __FILE__ ) . '/simple_html_dom.php');

if (isset ( $argv [1] )) {
	$url = $argv [1];
} else {
	$url = 'http://www.ftchinese.com/rss/feed';
}

mysql_query ( 'USE fundy' );
mysql_query ( "
				CREATE TABLE IF NOT EXISTS  `_feed` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `title` TEXT NOT NULL,
                  `description` TEXT NOT NULL,
                  `link` TEXT NOT NULL,
                  `date` VARCHAR(45) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`),
				  UNIQUE KEY `id_UNIQUE` (`link`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;
				" );

echo $url;

try {
	$feed = file_get_contents ( urldecode ( $url ) );
	$xml = simplexml_load_string ( $feed, "SimpleXMLElement", LIBXML_NOCDATA );
	$json = json_encode ( $xml );
	$array = json_decode ( $json, TRUE );
	var_dump ( $array );
	
	if (isset ( $array ['channel'] ['item'] )) {
		$loopArray = $array ['channel'] ['item'];
	} else {
		$loopArray = $array ['item'];
	}
	
	foreach ( $loopArray as $item ) {
		// var_dump ( $item );
		if (count ( sql_select_array ( "
				SELECT ID
				FROM `fundy`.`_feed`
				WHERE link = '" . mysql_real_escape_string ( $item ['link'] ) . "' 
				AND date = '" . mysql_real_escape_string ( $item ['pubDate'] ) . "' 
				LIMIT 1
				" ) ) < 1) {
			
			$txt = $item ['title'];
			echo ' ' . sql_insert_id ( "
				INSERT INTO `fundy`.`_feed`
					(`title`, `description`, `link`, `date`)
				VALUES ('" . mysql_real_escape_string ( $txt ) . "',
				'" . mysql_real_escape_string ( $item ['description'] ) . "',
				'" . mysql_real_escape_string ( $item ['link'] ) . "',
				'" . mysql_real_escape_string ( $item ['pubDate'] ) . "');
	 		 " );
		}
		
		echo "mysql_errno: ";
		echo mysql_errno ( $_MYSQLCONNECTION ) . mysql_error ( $_MYSQLCONNECTION ) . "\n";
	}
} catch ( Exception $e ) {
}
?>