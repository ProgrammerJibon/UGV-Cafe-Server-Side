<?php 
if (!isset($result)) {
	exit();
}
 ?>
<div class="settings_main">
	<div class="settings_item">
		<div class="settings_title">
			Facebook:
		</div>
		<div>
			<input type="text" onchange="change_text_settings(this, 'div.changing_facebook', 'facebook')" class="change_text" value="<?php echo $result['facebook']; ?>">
		</div>
		<div class="changing_facebook result_change_text"></div>
	</div>	
	<div class="settings_item">
		<div class="settings_title">
			Twitter:
		</div>
		<div>
			<input type="text" onchange="change_text_settings(this, 'div.changing_site_twitter', 'twitter')" class="change_text" value="<?php echo $result['twitter']; ?>">
		</div>
		<div class="changing_site_twitter result_change_text"></div>
	</div>	
	<div class="settings_item">
		<div class="settings_title">
			Instagram:
		</div>
		<div>
			<input type="text" onchange="change_text_settings(this, 'div.changing_site_instagram', 'instagram')" class="change_text" value="<?php echo $result['instagram']; ?>">
		</div>
		<div class="changing_site_instagram result_change_text"></div>
	</div>	
	<div class="settings_item">
		<div class="settings_title">
			WhatsApp:
		</div>
		<div>
			<input type="text" onchange="change_text_settings(this, 'div.changing_site_whatsapp_number', 'whatsapp_number')" class="change_text" value="<?php echo $result['whatsapp']; ?>">
		</div>
		<div class="changing_site_whatsapp_number result_change_text"></div>
	</div>	
</div>
<script type="text/javascript">
	document.querySelector("title").innerHTML = "Social Media Links";
</script>