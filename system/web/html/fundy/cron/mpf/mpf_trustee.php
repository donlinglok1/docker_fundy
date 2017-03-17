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

function get_decorated_diff($old, $new) {
	$from_start = strspn ( $old ^ $new, "\0" );
	$from_end = strspn ( strrev ( $old ) ^ strrev ( $new ), "\0" );

	$old_end = strlen ( $old ) - $from_end;
	$new_end = strlen ( $new ) - $from_end;

	$start = substr ( $new, 0, $from_start );
	$end = substr ( $new, $new_end );
	$new_diff = substr ( $new, $from_start, $new_end - $from_start );
	$old_diff = substr ( $old, $from_start, $old_end - $from_start );

	$new = "$start<ins style='background-color:#ccffcc'>$new_diff</ins>$end";
	$old = "$start<del style='background-color:#ffcccc'>$old_diff</del>$end";
	return array (
			"old" => $old,
			"new" => $new
	);
}

$string_old = "The quick brown fox jumped over the lazy dog";
$string_new = "The quick white rabbit jumped over the lazy dog";
$diff = get_decorated_diff ( $string_old, $string_new );
echo "<table>
    <tr>
        <td>" . $diff ['old'] . "</td>
        <td>" . $diff ['new'] . "</td>
    </tr>
</table>";


echo (microtime ( true ) - $time_start);
?>
