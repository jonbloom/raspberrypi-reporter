<?php
date_default_timezone_set('America/Detroit');
include 'connection.php';
include 'secret.php';

$rooms = array('7693'=>'LIB 302', '7694'=>'LIB 303', '7695'=>'LIB 304', '7696'=>'LIB 305');

$now = date('Y-m-d H:i:s');

if ($_GET['pw'] == $pw){
	$selectSql = "SELECT 1 FROM raspberrypi WHERE MAC_ADDRESS = '" . $_GET['mac'] . "'";
	$exists = getConnection()->query($selectSql);
	if ($exists->num_rows){
		$updateSql = "UPDATE raspberrypi SET IP_ADDRESS = '{$_GET['ip']}', ROOM_NUMBER = '{$rooms[$_GET['room_id']]}', EMS_ID = '{$_GET['room_id']}', LAST_UPDATED = '{$now}' WHERE MAC_ADDRESS = '{$_GET['mac']}'";
		getConnection()->query($updateSql);
		echo 'updated';
	} else {
		$insertSql = "INSERT INTO raspberrypi (MAC_ADDRESS, IP_ADDRESS, ROOM_NUMBER, EMS_ID, LAST_UPDATED) VALUES ('{$_GET['mac']}', '{$_GET['ip']}', '{$rooms[$_GET['room_id']]}', '{$_GET['room_id']}', '{$now}')";
		getConnection()->query($insertSql);
		echo 'inserted';
	}
}
?>