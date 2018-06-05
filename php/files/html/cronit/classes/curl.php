<?php
class CURL {
	public function get($url) {
		$ch = curl_init ( $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 0 );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 400 );
		return curl_exec ( $ch );
	}
}
?>