<?php
include 'connection.php';
include 'secret.php';
$now = date('Y-m-d H:i:s');
if ($_GET['pw'] == $pw){
	$insertSql = "INSERT INTO log (LOG_ID, EMS_ID, TIMESTAMP, BOOKING_ID, RESERVED_BY) VALUES (NULL,'{$_GET['room_id']}', '{$now}', '{$_GET['booking_id']}','{$_GET['reserved_by']}')";
	getConnection()->query($insertSql);
	echo 'inserted';
}
