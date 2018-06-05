<?php
ini_set ( "memory_limit", "256M" );
set_time_limit ( 0 ); // to infinity for example

$time_start = microtime ( true );

include (dirname ( __FILE__ ) . '/../../.ba&4AhAF_mysql.php');

include (dirname ( __FILE__ ) . '/../../google/googleDocToken.php');

$tablearray = sql_select_array ( "
		SELECT company, ticker_google AS 'ticker'
		FROM `fundy`.`mpfs`
		" );

$tarray = array ();

for($i = 0; $i < count ( $tablearray ); $i ++) {
	$tarray [$i] = array (
			$tablearray [$i] ['company'],
			$tablearray [$i] ['ticker'],
			'=GoogleFinance($B' . ($i + 3) . ',C$1)',
			'=GoogleFinance($B' . ($i + 3) . ',D$1)',
			'=GoogleFinance($B' . ($i + 3) . ',E$1)',
			'=GoogleFinance($B' . ($i + 3) . ',F$1)',
			'=GoogleFinance($B' . ($i + 3) . ',G$1)',
			'=GoogleFinance($B' . ($i + 3) . ',H$1)',
			'=GoogleFinance($B' . ($i + 3) . ',I$1)',
			'=GoogleFinance($B' . ($i + 3) . ',J$1)',
			'=GoogleFinance($B' . ($i + 3) . ',K$1)',
			'=GoogleFinance($B' . ($i + 3) . ',L$1)',
			'=GoogleFinance($B' . ($i + 3) . ',M$1)',
			'=GoogleFinance($B' . ($i + 3) . ',N$1)',
			'=GoogleFinance($B' . ($i + 3) . ',O$1)',
			'=GoogleFinance($B' . ($i + 3) . ',P$1)',
			'=GoogleFinance($B' . ($i + 3) . ',Q$1)',
			'=GoogleFinance($B' . ($i + 3) . ',R$1)' 
	);
}

$spreadsheetId = '1HlAK-2ICLM2uoBR9xkC5hGWplxeBQ1FyflPXeNowO6w';
$range = 'sheet1!A3:ZZ9999';
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
