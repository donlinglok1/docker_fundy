<?php
include_once __DIR__ . "/../allautoload.php";

$loadtime = new LoadTime ();

$db = Database::get ();

$spreadsheetId = '1IeflNPNSikGe7xq4T4mvkiK_jUOxjDEymolXzU8Iqn4';
$range = 'sheet1!A1:ZZ9999';

$service = GoogleSheet::get ();
$response = $service->spreadsheets_values->get ( $spreadsheetId, $range );
$values = $response->getValues ();

foreach ( $values as $item ) {
	$iquery = "";
	if ($item [1] == "HKD") {
		$db->raw ( "CREATE TABLE IF NOT EXISTS `currency`.`" . $item [1] . "_" . YMD . "` (
				 	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  	`create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  	`currency` varchar(45) NOT NULL,
				  	`price` varchar(45) NOT NULL,
				  	PRIMARY KEY (`id`),
				  	UNIQUE KEY `id_UNIQUE` (`id`),
				  	KEY `currency` (`currency`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;
					" );
		
		for($i = 2; $i < count ( $item ); $i ++) {
			$currency = $values [1] [$i];
			$price = $item [$i];
			
			$rows = $db->select ( "
								ID FROM `currency`.`" . $item [1] . "_" . YMD . "`
								WHERE currency = :currency
								AND price = :price
								AND create_datetime > DATE_ADD(NOW(), INTERVAL -30 SECOND)
								LIMIT 1", array (
					"currency" => $currency,
					"price" => $price 
			) );
			if (count ( $rows ) < 1) {
				echo $db->insert ( '`currency`.`' . $item [1] . '_' . YMD . '`', array (
						'currency' => $currency,
						'price' => $price 
				) );
			}
		}
	}
}
?>
