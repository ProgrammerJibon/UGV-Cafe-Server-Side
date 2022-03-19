<?php 
if (!isset($_SESSION['user_admin'])) {
	require 'page-header.php';
	echo '<div class="require_pass"></div>';
	require 'page-footer.php';
}elseif (isset($_SESSION['user_admin']) && $_SESSION['user_admin'] == "999984") {
	require_once 'admin-dashboard-logged-in.php';
}else{
	require 'page-footer.php';
	echo '<div class="require_pass"></div>';
	require 'page-footer.php';
}