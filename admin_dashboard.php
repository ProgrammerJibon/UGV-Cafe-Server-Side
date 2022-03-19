<?php 
if (!isset($_SESSION['user_admin'])) {
	require 'page-header.php';
	echo '<div class="require_pass">Entering wrong password will make you wait 30 sec everytime</div>';
	require 'page-footer.php';
}elseif (isset($_SESSION['user_admin']) && $_SESSION['user_admin'] == "45646546545sd45f64sa65d45ds4f564sad5f45a315sd4f564as521dc451fs5d1f564asdf564as5df15ew64r54") {
	require_once 'admin-dashboard-logged-in.php';
}else{
	require 'page-footer.php';
	echo '<div class="require_pass">Entering wrong password will make you wait 30 sec everytime</div>';
	require 'page-footer.php';
}