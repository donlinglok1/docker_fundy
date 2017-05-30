<?php
$time_start = microtime ( true );

ini_set ( "memory_limit", "256M" );
set_time_limit ( 0 ); // to infinity for example

ini_set ( 'session.save_path', dirname ( __FILE__ ) . '/session' );
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');
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
include_once "google-api-php-client/examples/templates/base.php";

/**
 * **********************************************
 * Make an API request authenticated with a service
 * account.
 * **********************************************
 */
require_once realpath ( dirname ( __FILE__ ) . '/google-api-php-client/src/Google/autoload.php' );

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
$key_file_location = dirname ( __FILE__ ) . '/Fundy-5f1e8fcca213.p12'; // key.p12
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

// for cmd test
$SID = '1IeflNPNSikGe7xq4T4mvkiK_jUOxjDEymolXzU8Iqn4';

mysql_query ( 'USE fundy' );
$tablearray = sql_select_array ( "
		SELECT company,
		ticker_google AS 'ticker'
		FROM fundy._currency
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

// echo json_encode ( $row2, true );
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
// echo json_encode ( $tarray, true );

$spreadsheetId = $SID;
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
