<?php
date_default_timezone_set ( 'Asia/Taipei' );

$_YMD = date ( 'Y-m-d' );

$_MYSQLHOST = 'fundydb.alllwork.com';
$_MYSQLUSER = 'fundy';
$_MYSQLPW = 'a254984517tu';
$_MYDB = '';

$_MYSQLCONNECTION = mysqli_connect ( $_MYSQLHOST, $_MYSQLUSER, $_MYSQLPW, $_MYDB );

if (! $_MYSQLCONNECTION) {
	die ( mysqli_error () );
}

mysqli_query ( 'SET NAMES "UTF8"' );
mysqli_query ( 'SET SESSION time_zone = "+8:00"' );
function sql_select_obj($query) {
	$result = new stdClass ();
	$q = mysqli_query ( $query );
	while ( $r = mysqli_fetch_assoc ( $q ) ) {
		$result = $r;
	}
	
	return $result;
}
function sql_select_array($query) {
	$result = array ();
	$q = mysqli_query ( $query );
	while ( $r = mysqli_fetch_assoc ( $q ) ) {
		$result [] = $r;
	}
	
	return $result;
}
function sql_insert_id($query) {
	mysqli_query ( $query );
	return mysqli_insert_id ();
}
function sql_update_num($query) {
	mysqli_query ( $query );
	return mysqli_affected_rows ();
}

?>