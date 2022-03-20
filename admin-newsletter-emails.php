<?php 
$sql = "SELECT * FROM `subscribed` ORDER BY `subscribed`.`id` DESC";
$sql = mysqli_query($connect, $sql);
?>
<div style="max-width: 600px; margin: 64px auto;">
	<form action="/json.php" method="POST">
		<div>
			<h3>
				<span style="color: white;">
					Sent mail to all email...
				</span>
			</h3>
		</div>
		<div style="color: white;">
			<?php 
				if (isset($_GET['sent'])) {
					echo $_GET['sent']." is succesfully sent to all newsletter subscribed mail.";
				}	
			?>
		</div>
		<div>
			<input type="text" name="news_letter_title" placeholder="Subject" style="width: 100%">
		</div>
		<div>
			<textarea name="news_letter_email" placeholder="Type Mail (HTML supported)" style="width: 100%; height: 200px; padding: 16px;"></textarea>
		</div>
		<div>
			<button style="width: 100%" type="submit">
				Send
			</button>
		</div>
	</form>
</div>
<table>
	<thead>
		<tr>
			<th>Date</th>
			<th>Email</th>
			<th>Ip Address</th>
			<th>Action</th>
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
			<td style="display: flex;align-items: center;justify-content: center; padding: 0;">
				<form action="/json.php" method="POST">
					<button style="width: 100px;" name="delete_newsletter_email" value="<?php echo $key['id']; ?>">Delete</button>
				</form>
			</td>
		</tr><?php
}?>
	</tbody>
</table>
	