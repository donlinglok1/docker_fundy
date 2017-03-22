<?php
ini_set ( 'memory_limit', '1024M' );

include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');

require_once dirname ( __FILE__ ) . "/../php/fukuball/vendor/fukuball/jieba-php/src/vendor/multi-array/MultiArray.php";
require_once dirname ( __FILE__ ) . "/../php/fukuball/vendor/fukuball/jieba-php/src/vendor/multi-array/Factory/MultiArrayFactory.php";
require_once dirname ( __FILE__ ) . "/../php/fukuball/vendor/fukuball/jieba-php/src/class/Jieba.php";
require_once dirname ( __FILE__ ) . "/../php/fukuball/vendor/fukuball/jieba-php/src/class/Finalseg.php";
require_once dirname ( __FILE__ ) . "/../php/fukuball/vendor/fukuball/jieba-php/src/class/Posseg.php";
require_once dirname ( __FILE__ ) . "/../php/fukuball/vendor/fukuball/jieba-php/src/class/JiebaAnalyse.php";
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Posseg;
use Fukuball\Jieba\JiebaAnalyse;
Jieba::init ();
Finalseg::init ();
Posseg::init ();
JiebaAnalyse::init ();
function jieba_cut($text) {
	$seg_list = Jieba::cut ( $text );
	
	return $seg_list;
}
function jieba_posseg($text) {
	$seg_list = Posseg::cut ( $text );
	
	return $seg_list;
}
function jieba_analyse($text) {
	$seg_list = JiebaAnalyse::extractTags ( $text, 20 );
	
	return $seg_list;
}

$loopArray = sql_select_array ( "
				SELECT id, title FROM fundy._feed
				WHERE word2vec_flag = '0'
				GROUP BY title
				" );

foreach ( $loopArray as $item ) {
	if (strlen ( $item ['title'] ) > 3) {
		var_dump ( $item );
		$strArray = jieba_cut ( ($item ['title']) );
		// var_dump ( $strArray);
		
		$txt = "";
		foreach ( $strArray as $strs ) {
			$txt = $txt . $strs . " ";
		}
		
		echo file_put_contents ( dirname ( __FILE__ ) . '/jieba.txt', $txt . PHP_EOL, FILE_APPEND );
		
		echo 'sql_insert_id: ' . sql_insert_id ( "
					UPDATE `fundy`.`_feed` 
					SET `word2vec_flag`='1' WHERE `id`='" . $item ['id'] . "';
	 		 " );
		
		echo "mysql_errno: ";
		echo mysql_errno ( $_MYSQLCONNECTION ) . mysql_error ( $_MYSQLCONNECTION ) . "\n";
	}
}
?>