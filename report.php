<?php
include 'connection.php';
include 'secret.php';
if ($_GET['pw'] == $pw){
	$selectSql = "SELECT 1 FROM raspberrypi WHERE MAC_ADDRESS = '" . $_GET['mac'] . "'";
	$exists = getConnection()->query($selectSql);
	if ($exists->num_rows){
		$updateSql = "UPDATE raspberrypi SET IP_ADDRESS = '{$_GET['ip']}', EMS_ID = '{$_GET['room_id']}', LAST_UPDATED = NULL WHERE MAC_ADDRESS = '{$_GET['mac']}'";
		getConnection()->query($updateSql);
	} else {
		$insertSql = "INSERT INTO raspberrypi (MAC_ADDRESS, IP_ADDRESS, ROOM_NUMBER, EMS_ID, LAST_UPDATED) VALUES ('{$_GET['mac']}', '{$_GET['ip']}', 0, '{$_GET['room_id']}', NULL)";
		getConnection()->query($insertSql);
	}
}
?>