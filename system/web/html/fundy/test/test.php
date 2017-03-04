<?php
include dirname ( __FILE__ ) . '/jieba.php';

$strArray = jieba_cut ( "當你在穿山越嶺的另一邊我在孤獨的路上沒有盡頭" );
var_dump ( $strArray );
?>