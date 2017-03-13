<?php
date_default_timezone_set('UTC');
$_YMD = date ( 'Y-m-d' );

$_MYSQLHOST = 'fundydb.alllwork.com';
$_MYSQLUSER = 'fundy';
$_MYSQLPW = 'a254984517tu';
$_MYSQLCONNECTION = mysql_connect ( $_MYSQLHOST, $_MYSQLUSER, $_MYSQLPW );

if (! $_MYSQLCONNECTION) {
	die ( mysql_error () );
}

function sql_select_obj($query) {
	$result = new stdClass ();
	$q = mysql_query ( $query );
	while ( $r = mysql_fetch_assoc ( $q ) ) {
		$result = $r;
	}
	
	return $result;
}
function sql_select_array($query) {
	$result = array ();
	$q = mysql_query ( $query );
	while ( $r = mysql_fetch_assoc ( $q ) ) {
		$result [] = $r;
	}
	
	return $result;
}
function sql_insert_id($query) {
	mysql_query ( $query );
	return mysql_insert_id ();
}
function sql_update_num($query) {
	mysql_query ( $query );
	return mysql_affected_rows ();
}

?>