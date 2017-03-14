<?php
$time_start = microtime ( true );
include (dirname ( __FILE__ ) . '/../../../.ba&4AhAF_mysql.php');

$array = sql_select_array ( "
		SELECT company
		FROM `fundy`.`mpfs`
		" );
$array2 = sql_select_array ( "
		SELECT id, name
		FROM `fundy`.`mpfs_trustee`
		" );

$index = count ( $array );
for($i = 0; $i < $index; $i ++) {
	$company = $array [$i] ["company"];
	echo $company;
	
	foreach ( $array2 as $item2 ) {
		$name = $item2 ["name"];
		if (substr ( $company, 0, strlen ( $name ) ) === $name) {
			update ( $i, $item2 ["id"] );
		}
	}
}

function update($i, $id) {
	$cmd = "UPDATE `fundy`.`mpfs` SET `trustee_id`='".$id."' WHERE `id`='".$i."'";
	echo '<br>' . sql_update_num ( $cmd );
}

echo (microtime ( true ) - $time_start);
?>
