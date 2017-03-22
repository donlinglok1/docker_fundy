<?php
include __DIR__ . "/../fundy/google-api-php-client/src/Google/autoload.php";
function allautoload($className) {
	$folders = array (
			__DIR__ . "/../fundy/google-api-php-client/src/Google/",
			__DIR__ . "/classes/" 
	);
	
	foreach ( $folders as $folder ) {
		$fileName = $folder . strtolower ( $className ) . ".php";
		if (is_readable ( $fileName )) {
			require $fileName;
		}
	}
}

spl_autoload_register ( 'allautoload' );
?>