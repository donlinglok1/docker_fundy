<?php
class CURL {
	public function get($url) {
		$ch = curl_init ( $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		return curl_exec ( $ch );
	}
}
?>