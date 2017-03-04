<?php
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');

$sqlResult = sql_select_array ( "
		SELECT id, period, link 
		FROM cronit.crontab
		WHERE count >= 1 
		AND ((time_range_start IS NULL
        AND time_range_end IS NULL)
        OR (NOW() BETWEEN STR_TO_DATE(CONCAT('" . $_YMD . " ', `time_range_start`),
            '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(CONCAT('" . $_YMD . " ', `time_range_end`),
            '%Y-%m-%d %H:%i:%s'))
        OR (`time_range_add` IS NOT NULL
        AND NOW() BETWEEN STR_TO_DATE(CONCAT('" . $_YMD . " ', `time_range_start`),
            '%Y-%m-%d %H:%i:%s') AND DATE_ADD(STR_TO_DATE(CONCAT('" . $_YMD . " ', `time_range_end`),
                '%Y-%m-%d %H:%i:%s'),
        INTERVAL `time_range_add` MINUTE)))
		AND NOW() > next_run_date 
		
		" );
//AND id < 100
foreach ( $sqlResult as $row ) {
	echo "sql_update_num: ";
	echo sql_update_num ( "
		UPDATE cronit.crontab 
		SET next_run_date = DATE_ADD(NOW(),INTERVAL " . $row ['period'] . " SECOND),
		count = count + 1 
		WHERE id='" . $row ['id'] . "';
		" );
	
	echo "mysql_errno: ";
	echo mysql_errno ( $_MYSQLCONNECTION ) . mysql_error ( $_MYSQLCONNECTION ) . "\n";
	
	if (substr ( $row ['link'], 0, 4 ) === "http") {
		echo $row ['link'];
		$ch = curl_init ( $row ['link'] );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		echo "result: ";
		echo curl_exec ( $ch );
	} else {
		echo 'php -q ' . dirname ( __FILE__ ) . '/..' . $row ['link'];
		echo "result: ";
		var_dump ( exec ( 'php -q ' . dirname ( __FILE__ ) . '/..' . $row ['link'] ) );
	}
}

?> 