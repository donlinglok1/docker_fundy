<?php
// var_dump ( $_SERVER );
$request = ' /info/';

//if (isset ( $_GET ['lb'] ) && $_GET ['lb'] == 1) {
//	header ( 'Location: ' . $request );
//} else {
	//$lbdomain = 'lb.acutetech.hk';
	//$ip = $_SERVER ['REMOTE_ADDR'];
	//$domain = $_SERVER ['HTTP_HOST'];
	
	//if (strpos ( $_SERVER ['REQUEST_URI'], '?' ) != - 1) {
	//	$request = $_SERVER ['REQUEST_URI'] . '?lb=1';
	//} else {
	//	$request = $_SERVER ['REQUEST_URI'] . '&lb=1';
	//}
	
	//$query = @unserialize ( file_get_contents ( 'http://ip-api.com/php/' . $ip ) );
	//if ($query && $query ['status'] == 'success' && $query ['countryCode'] != 'CN' && $domain != $lbdomain) {
	//	header ( 'Location: http://' . $lbdomain . $request );
	//} else {
		header ( 'Location: ' . $request );
	//}
//}
?>
