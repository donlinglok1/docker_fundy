<?php
include (dirname ( __FILE__ ) . '/../../.ba&4AhAF_mysql.php');

if (isset ( $_GET ['key'] )) {
} else {
	$_GET ['key'] = 'HKG:1127';
}

$json = array ();

$json ['data'] = sql_select_array ( "
		SELECT price,tradetime FROM fundy.stock_HKG_2016_08_24 WHERE ticker_google = '" . $_GET ['key'] . "'
" );

header ( 'Content-Type: application/json; charset=utf-8' );
echo json_encode ( $json, true );
?> 
