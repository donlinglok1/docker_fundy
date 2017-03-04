<?php
function jieba_cut($text) {
	$cjiebapath = dirname ( __FILE__ ) . "/../../cjieba";
	
	echo "cd " . $cjiebapath . " && ./jiebacut " . $text;
	exec ( "cd " . $cjiebapath . " && ./jiebacut " . $text, $outputArray );
	// var_dump ( $outputArray );
	return $outputArray;
}
?>