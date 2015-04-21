<?php
include 'connection.php';
include 'secret.php';
if ($_GET['pw'] == $pw){
	$insertSql = "INSERT INTO log (LOG_ID, EMS_ID, TIMESTAMP, BOOKING_ID, RESERVED_BY) VALUES (NULL,'{$_GET['room_id']}', NULL, '{$_GET['booking_id']}','{$_GET['reserved_by']}')";
	echo $sql;
	getConnection()->query($insertSql);
	echo 'inserted';
}
