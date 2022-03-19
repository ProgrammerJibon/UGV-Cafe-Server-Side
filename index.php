<?php 
require_once 'functions.php';
if (isset($_GET['page']) && $_GET['page'] != "" && $page = $_GET['page']) {
	require_once 'page-home.php';
}else{
	require_once 'page-home.php';
}