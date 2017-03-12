<?php
$time_start = microtime ( true );

ini_set ( 'session.save_path', dirname ( __FILE__ ) . '/../../session' );
include (dirname ( __FILE__ ) . '/../../../.ba&4AhAF_mysql.php');
/*
 * Copyright 2013 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
session_start ();
include_once (dirname ( __FILE__ ) . "/../../google-api-php-client/examples/templates/base.php");

/**
 * **********************************************
 * Make an API request authenticated with a service
 * account.
 * **********************************************
 */
require_once realpath ( dirname ( __FILE__ ) . '/../../google-api-php-client/src/Google/autoload.php' );

/**
 * **********************************************
 * ATTENTION: Fill in these values! You can get
 * them by creating a new Service Account in the
 * API console.
 * Be sure to store the key file
 * somewhere you can get to it - though in real
 * operations you'd want to make sure it wasn't
 * accessible from the webserver!
 * The name is the email address value provided
 * as part of the service account (not your
 * address!)
 * Make sure the Books API is enabled on this
 * account as well, or the call will fail.
 * **********************************************
 */
$client_id = '641681166632-bla6hfsagifsp0m67ej8ndv4cbuf6csd.apps.googleusercontent.com'; // Client ID
$service_account_name = 'fundy-1378@appspot.gserviceaccount.com'; // Email Address
$key_file_location = dirname ( __FILE__ ) . '/../../Fundy-5f1e8fcca213.p12'; // key.p12
                                                                       // IhWFDrTbjBdbCb0GNwlN0Iyw
                                                                       // echo pageHeader ( "Service Account Access" );
if (strpos ( $client_id, "googleusercontent" ) == false || ! strlen ( $service_account_name ) || ! strlen ( $key_file_location )) {
	echo missingServiceAccountDetailsWarning ();
	exit ();
}

$client = new Google_Client ();
$client->setApplicationName ( "Client_Library_Examples" );
$service = new Google_Service_Sheets ( $client );

/**
 * **********************************************
 * If we have an access token, we can carry on.
 * Otherwise, we'll get one with the help of an
 * assertion credential. In other examples the list
 * of scopes was managed by the Client, but here
 * we have to list them manually. We also supply
 * the service account
 * **********************************************
 */
if (isset ( $_SESSION ['service_token'] )) {
	$client->setAccessToken ( $_SESSION ['service_token'] );
}
$key = file_get_contents ( $key_file_location );
$cred = new Google_Auth_AssertionCredentials ( $service_account_name, array (
		'https://www.googleapis.com/auth/spreadsheets' 
), $key );
$client->setAssertionCredentials ( $cred );
if ($client->getAuth ()->isAccessTokenExpired ()) {
	$client->getAuth ()->refreshTokenWithAssertion ( $cred );
}
$_SESSION ['service_token'] = $client->getAccessToken ();

mysql_query ( 'USE mpf;' );
mysql_query ( "
				CREATE TABLE IF NOT EXISTS mpf.`" . date ( "Y_m_d" ) . "` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  `ticker_google` varchar(45) NOT NULL,
				  `morningstarrating` varchar(15) NOT NULL,
				  `price` varchar(15) NOT NULL,
				  `closeyest` varchar(15) NOT NULL,
				  `change` varchar(15) NOT NULL,
				  `changepect` varchar(15) NOT NULL,
				  `returnytd` varchar(14) NOT NULL,
				  `returnday` varchar(14) NOT NULL,
				  `return1` varchar(14) NOT NULL,
				  `return4` varchar(14) NOT NULL,
				  `return13` varchar(14) NOT NULL,
				  `return52` varchar(14) NOT NULL,
				  `return156` varchar(14) NOT NULL,
				  `return260` varchar(14) NOT NULL,
				  `expenseratio` varchar(100) NOT NULL,
				  `date` varchar(19) NOT NULL,
				  `yieldpct` varchar(12) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id_UNIQUE` (`id`),
				  KEY `ticker_google` (`ticker_google`)
				) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
				" );

$spreadsheetId = '1HlAK-2ICLM2uoBR9xkC5hGWplxeBQ1FyflPXeNowO6w';
$range = 'sheet1!B3:ZZ9999';
$response = $service->spreadsheets_values->get ( $spreadsheetId, $range );
$values = $response->getValues ();

if (count ( $values ) == 0) {
	print "No data found.<br>";
} else {
	// echo json_encode ( $values, true );
	
	foreach ( $values as $row ) {
		$cmd = "
				INSERT INTO `mpf`.`" . date ( "Y_m_d" ) . "`
				(`ticker_google`, `morningstarrating`, `price`,
				`closeyest`, `change`, `changepect`,
				`returnytd`, `returnday`, `return1`, `return4`,
				`return13`, `return52`, `return156`,
				`return260`, `expenseratio`, `date`, `yieldpct`)
				VALUES
	 		 ";
		$iquery = "";
		$ticker = "";
		$tradetime = "'#N/A'";
		foreach ( $row as $col ) {
			if (strpos ( $col, '上午' ) !== false) {
				$col = str_replace ( "上午 ", "", $col ) . " AM";
				$col = "STR_TO_DATE('" . $col . "','%Y/%m/%d %h:%i:%s %p')";
				$tradetime = $col;
			} else if (strpos ( $col, '下午' ) !== false) {
				$col = str_replace ( "下午 ", "", $col ) . " PM";
				$col = "STR_TO_DATE('" . $col . "','%Y/%m/%d %h:%i:%s %p')";
				$tradetime = $col;
			} else if (strpos ( $col, ':' ) !== false) {
				$ticker = $col;
				$col = "'" . $col . "'";
			} else {
				$col = "'" . $col . "'";
			}
			
			$iquery = $iquery . "," . $col;
		}
		$cmd = $cmd . "(" . substr ( $iquery, 1 ) . "),";
		
		if (count ( sql_select_array ( "
				SELECT ID
				FROM `mpf`." . date ( "Y_m_d" ) . "
				WHERE ticker_google = '" . $ticker . "'
				AND date = " . $tradetime . "
				LIMIT 1
				" ) ) < 1) {
			
			echo $cmd;
			
			echo "mysql_errno: ";
			echo mysql_errno ( $_MYSQLCONNECTION ) . mysql_error ( $_MYSQLCONNECTION ) . "\n";
		}
	}
}

echo (microtime ( true ) - $time_start);
?>
