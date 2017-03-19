<?php
date_default_timezone_set ( 'UTC' );
$_YMD = date ( 'Y-m-d' );

$_MYSQLHOST = 'fundydb.alllwork.com';
$_MYSQLUSER = 'fundy';
$_MYSQLPW = 'a254984517tu';
$_MYSQLCONNECTION = mysql_connect ( $_MYSQLHOST, $_MYSQLUSER, $_MYSQLPW );

if (! $_MYSQLCONNECTION) {
	die ( mysql_error () );
}

mysql_query ( 'SET NAMES "UTF8"' );
class MySQL {
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
		return mysql_insert_id ();
	}
	public function update($query) {
		mysql_query ( $query );
		return mysql_affected_rows ();
	}
}
?>