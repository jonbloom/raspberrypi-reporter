<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Raspberry Pi Admin</title>
	<style>
	body, html{
		margin: 0;
		font-family: Arial, Helvetica, sans-serif;
	}
	</style>
</head>
	<body>
		<h1>Raspberry Pi Admin</h1>
		<h2>Raspberry Pis</h2>
		<table>
			<thead>
				<tr>
					<th>Room</th>
					<th>EMS ID</th>
					<th>IP Aaddress</th>
					<th>MAC Address</th>
					<th>Last Updated</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = 'SELECT ROOM_NUMBER, EMS_ID, IP_ADDRESS, MAC_ADDRESS, LAST_UPDATED FROM raspberrypi';
				$res = getConnection()->query($sql);
				while ($pi = $res->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $pi['ROOM_NUMBER']; ?></td>
						<td><?php echo $pi['EMS_ID']; ?></td>
						<td><?php echo $pi['IP_ADDRESS']; ?></td>
						<td><?php echo $pi['MAC_ADDRESS']; ?></td>
						<td><?php echo $pi['LAST_UPDATED']; ?></td>
					</tr>
				<?php } ?>			
			</tbody>
		</table>
		<h2>Log</h2>
		<table>
			<thead>
				<tr>
					<th>Room</th>
					<th>Timestamp</th>
					<th>Booking ID</th>
					<th>Reserved By</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = 'SELECT raspberrypi.ROOM_NUMBER, log.TIMESTAMP, log.BOOKING_ID, log.RESERVED_BY FROM raspberrypi, log WHERE raspberrypi.EMS_ID = log.EMS_ID ORDER BY log.TIMESTAMP';
				$res = getConnection()->query($sql);
				while ($log = $res->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $log['ROOM_NUMBER']; ?></td>
						<td><?php echo $log['TIMESTAMP']; ?></td>
						<td><?php echo $log['BOOKING_ID']; ?></td>
						<td><?php echo $log['RESERVED_BY']; ?></td>
					</tr>
				<?php } ?>			
			</tbody>
		</table>
	</body>
</html>