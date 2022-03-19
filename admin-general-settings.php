<?php 
if (!isset($result)) {
	exit();
}
 ?>
<div class="settings_main">
	<div class="settings_item">
		<div class="settings_title">
			Change Logo:
		</div>
		<div class="settings_img_change" onclick="document.querySelector('input#logo_change').click()">
			<img src="<?php echo $result['logo']; ?>">
		</div>
		<div>
			<form method="POST" enctype="multipart/form-data" action="/json.php">
				<input id="logo_change" type="file" oninput ="if (this.value != null) {document.querySelector('input#hit_logo_change').click()}" name="logo_change" accept="image/*" hidden>
				<input type="submit" id="hit_logo_change" hidden name="">
			</form>
		</div>
	</div>
	<div class="settings_item">
		<div class="settings_title">
			Change Homepage banner:
		</div>
		<div class="settings_img_change" onclick="document.querySelector('input#home_page_banner_1').click()">
			<img src="<?php echo $result['home-block-bg-1']; ?>">
		</div>
		<div>
			<form method="POST" enctype="multipart/form-data" action="/json.php">
				<input id="home_page_banner_1" type="file" oninput ="if (this.value != null) {document.querySelector('input#hit_home_page_banner_1').click()}" name="home_page_banner_1" accept="image/*" hidden>
				<input type="submit" id="hit_home_page_banner_1" hidden name="">
			</form>
		</div>
	</div>
	<div class="settings_item">
		<div class="settings_title">
			Change Homepage banner:
		</div>
		<div class="settings_img_change" onclick="document.querySelector('input#home_page_banner_2').click()">
			<img src="<?php echo $result['home-block-bg-2']; ?>">
		</div>
		<div>
			<form method="POST" enctype="multipart/form-data" action="/json.php">
				<input id="home_page_banner_2" type="file" oninput ="if (this.value != null) {document.querySelector('input#hit_home_page_banner_2').click()}" name="home_page_banner_2" accept="image/*" hidden>
				<input type="submit" id="hit_home_page_banner_2" hidden name="">
			</form>
		</div>
	</div>
	
	<div class="settings_item">
		<div class="settings_title">
			Change Website Title:
		</div>
		<div>
			<input type="text" onchange="change_text_settings(this, 'div.changing_site_title', 'title')" class="change_text" value="<?php echo $result['title']; ?>">
		</div>
		<div class="changing_site_title result_change_text"></div>
	</div>
	<div class="settings_item">
		<div class="settings_title">
			Change Phone Number:
		</div>
		<div>
			<input type="text" onchange="change_text_settings(this, 'div.changing_phone', 'phone')" class="change_text" value="<?php echo $result['phone']; ?>">
		</div>
		<div class="changing_phone result_change_text"></div>
	</div>
	<div class="settings_item">
		<div class="settings_title">
			Change Address:
		</div>
		<div>
			<input type="text" onchange="change_text_settings(this, 'div.changing_site_address', 'address')" class="change_text" value="<?php echo $result['address']; ?>">
		</div>
		<div class="changing_site_address result_change_text"></div>
	</div>
	<div class="settings_item">
		<div class="settings_title">
			Change Email:
		</div>
		<div>
			<input type="email" onchange="change_text_settings(this, 'div.changing_site_email', 'email')" class="change_text" value="<?php echo $result['email']; ?>">
		</div>
		<div class="changing_site_email result_change_text"></div>
	</div>
	<div class="settings_item">
		<div class="settings_title">
			Change Admin Password:
		</div>
		<div>
			<input type="password" onchange="change_text_settings(this, 'div.changing_password', 'password', 'pass')" class="change_text" placeholder="Password">
		</div>
		<div class="changing_password result_change_text"></div>
	</div>		
</div>
<script type="text/javascript">
	document.querySelector("title").innerHTML = "Website General Settings";
</script>