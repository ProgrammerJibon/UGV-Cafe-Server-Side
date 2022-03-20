<?php 
$sql = "SELECT * FROM `table_boos` ORDER BY `table_boos`.`book_date` DESC";
$sql = mysqli_query($connect, $sql);
?>
<table>
	<thead>
		<tr>
			<th>Posted on</th>
			<th>Coming Date & time</th>
			<th>Name & Person count</th>
			<th>Email & Phone</th>
			<th>Ip Address & User Agent</th>
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
			<td style="user-select: all">
                <?php echo $key['book_date']; ?>
                <br>
                <?php echo $key['book_time']; ?>
            </td>
			<td>
                <?php echo $key['book_name']; ?>
                <br>
                <?php echo $key['book_person_count']; ?> person will come
            </td>
			<td>
                <?php echo $key['book_email']; ?>
                <br>
                <?php echo $key['book_phone']; ?>
            </td>
			<td>
                <?php echo $key['ip']; ?>
                <br>
                <span style="cursor: pointer; color: red;" onclick="alert('User Agent: <?php echo $key['user-agent']; ?>')">Show User Agent</span>
            </td>
            
			<td style="display: flex;align-items: center;justify-content: center; padding: 0;">
				<form action="/json.php" method="POST">
					<button onclick="if(!confirm('Are your sure to delete?')){return false;}" style="width: 100px;" name="delete_books" value="<?php echo $key['id']; ?>">Delete</button>
				</form>
			</td>
		</tr><?php
}?>
	</tbody>
</table>
	