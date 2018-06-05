<?php
ini_set ( 'session.save_path', __DIR__ . '/../../fundy/session' );
session_start ();

include_once __DIR__ . "/../../fundy/google-api-php-client/examples/templates/base.php";
require_once __DIR__ . '/../../fundy/google-api-php-client/src/Google/autoload.php';
class GoogleSheet {
	public function get() {
		$client_id = '641681166632-bla6hfsagifsp0m67ej8ndv4cbuf6csd.apps.googleusercontent.com'; // Client ID
		$service_account_name = 'fundy-1378@appspot.gserviceaccount.com'; // Email Address
		$key_file_location = __DIR__ . '/../../fundy/Fundy-5f1e8fcca213.p12';
		
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
		return $service;
	}
}
?>
