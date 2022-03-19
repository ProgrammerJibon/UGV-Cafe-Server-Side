<?php 
$sql = "SELECT * FROM `subscribed` ORDER BY `subscribed`.`id` DESC";
$sql = mysqli_query($connect, $sql);
?>
<table>
	<thead>
		<tr>
			<th>Date</th>
			<th>Email</th>
			<th>Ip Address</th>
		</tr>
	</thead>
	<tbody>
		<?php
foreach ($sql as $key) {
	?>	<tr>

			<td>
				<?php echo date('H:i:sA', $key['time']); ?>
				<br>
				<?php echo date('d M, Y', $key['time']); ?>
			</td>
			<td style="user-select: all"><?php echo $key['email']; ?></td>
			<td><?php echo $key['ip']; ?></td>
		</tr><?php
}?>
	</tbody>
</table>
	