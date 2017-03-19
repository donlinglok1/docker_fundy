<?php
date_default_timezone_set ( 'UTC' );

define ( "YMD", date ( 'Y-m-d' ) );
class MySQL {
	private $_MYSQLCONNECTION;
	
	function MySQL() {
		$_MYSQLHOST = 'fundydb.alllwork.com';
		$_MYSQLUSER = 'fundy';
		$_MYSQLPW = 'a254984517tu';
		
		$this->$_MYSQLCONNECTION = mysql_connect ( $_MYSQLHOST, $_MYSQLUSER, $_MYSQLPW );
		
		if (! $_MYSQLCONNECTION) {
			die ( mysql_error () );
		}
		
		mysql_query ( 'SET NAMES "UTF8"' );
	}
	public function query($query) {
		mysql_query ( $query );
	}
	public function select($query) {
		$result = array ();
		$q = mysql_query ( $query );
		while ( $r = mysql_fetch_assoc ( $q ) ) {
			$result [] = $r;
		}
		
		return $result;
	}
	public function insert($query) {
		mysql_query ( $query );
		echo "mysql_errno: " . mysql_errno ( $_MYSQLCONNECTION ) . PHP_EOL;
		return mysql_insert_id ();
	}
	public function update($query) {
		mysql_query ( $query );
		return mysql_affected_rows ();
	}
}
?>