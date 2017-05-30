<?php
ini_set ( "memory_limit", "256M" );
set_time_limit ( 0 ); // to infinity for example

$time_start = microtime ( true );

include (dirname ( __FILE__ ) . '/../../.ba&4AhAF_mysql.php');

include (dirname ( __FILE__ ) . '/../../fundy/simple_html_dom.php');

$tablearray = sql_select_array ( "
		SELECT company,
		ticker_google AS 'ticker'
		FROM `fundy`.`currencies`
		" );

$tarray = array ();
$row1 = array (
		"",
		"" 
);

for($i = 0; $i < count ( $tablearray ); $i ++) {
	$row1 [$i + 2] = $tablearray [$i] ['company'];
}

// echo json_encode ( $row1, true );
$tarray [0] = $row1;
$row2 = array (
		"",
		"" 
);
for($i = 0; $i < count ( $tablearray ); $i ++) {
	$row2 [$i + 2] = str_replace ( "CURRENCY:", "", $tablearray [$i] ['ticker'] );
}

$tarray [1] = $row2;

for($i = 0; $i < count ( $tablearray ); $i ++) {
	$tarray [$i + 2] = array (
			$tablearray [$i] ['company'],
			str_replace ( "CURRENCY:", "", $tablearray [$i] ['ticker'] ) 
	);
	
	for($ii = 0; $ii < count ( $tablearray ); $ii ++) {
		$tarray [$i + 2] [$ii + 2] = '=GOOGLEFINANCE("CURRENCY:' . str_replace ( "CURRENCY:", "", $tablearray [$i] ['ticker'] ) . str_replace ( "CURRENCY:", "", $tablearray [$ii] ['ticker'] ) . '")';
	}
}

$spreadsheetId = '1IeflNPNSikGe7xq4T4mvkiK_jUOxjDEymolXzU8Iqn4';
$range = 'sheet1!A1:ZZ9999';
$valueRange = new Google_Service_Sheets_BatchUpdateValuesRequest ( array (
		"valueInputOption" => "USER_ENTERED",
		"data" => array (
				"range" => $range,
				"majorDimension" => "ROWS",
				"values" => $tarray 
		) 
) );

$response2 = $service->spreadsheets_values->batchUpdate ( $spreadsheetId, $valueRange );

echo (microtime ( true ) - $time_start);
?>
