<?php
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');
include ('simple_html_dom.php');

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

$ch = curl_init ( 'http://www.jin10.com' );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
$curlResult = curl_exec ( $ch );
// echo $curlResult;
$count =0;
$html = str_get_html ( $curlResult );
foreach ( $html->find ( 'div[id=newslist] div table tbody' ) as $element ) {
	$i=0;
	$date;
	$title;
		foreach ( $element->find ( 'tr td[align=left]' ) as $element2 ) {
			$text = $element2->innertext;
			
			//echo $text;
			
			if (strpos($text, 'important-text') !== false) {
				$text=str_replace('<font color class="important-text"><b>','',str_replace('</b></font><br />',' ',$text));
			}else if (strpos($text, '<table') !== false) {
					$ele = $element2->find('tr td[align=center]')->innertext;
					if (strpos($ele, '实际：') !== false){
						$text = $ele;
					}else{
						$text = '';
					}
			}else if (strpos($text, '<a href') !== false) {
				$text = '';
			}
			
			//echo $i;
			$i++;
			
			if($i==2){
				$title=$text;
			}else{
				$date=$text;
				if(strlen($date)<6){
					$date=$date.":00";
				}
				$date =  date("Y-m-d ").$date;
			}
			
			if($i>1){
				break;
			}
		}
		$count++;
		
		if($count>50){
		}else{
		if (count ( sql_select_array ( "
				SELECT ID
				FROM `fundy`.`_feed`
				WHERE title = '" . mysql_real_escape_string ( $title ) . "'
				AND date = '" . mysql_real_escape_string ( $date ) . "'
				LIMIT 1
				" ) ) < 1) {
							
						$txt = $item ['title'];
						echo ' ' .  sql_insert_id ( "
				INSERT INTO `fundy`.`_feed`
					(`title`, `description`, `link`, `date`)
				VALUES ('" . mysql_real_escape_string ( $title ) . "',
				'" . mysql_real_escape_string ( '' ) . "',
				'" . mysql_real_escape_string ( '' ) . "',
				'" . mysql_real_escape_string ( $date ) . "');
	 		 " );
		}
		
			echo "mysql_errno: ";
			echo mysql_errno ( $_MYSQLCONNECTION ) . mysql_error ( $_MYSQLCONNECTION ) . "\n";
		}			
}

?>