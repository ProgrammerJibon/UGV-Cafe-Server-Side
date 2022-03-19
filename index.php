<?php 
require_once 'functions.php';
require_once 'data.php';
if (isset($_GET['page']) && $_GET['page'] != "" && $page = $_GET['page']) {
	if($page == "admin"){
		require_once 'admin_dashboard.php';
	}else{
		require_once 'page-home.php';
	}
	
}else{
	require_once 'page-home.php';
}