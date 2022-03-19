<?php 
require 'page-header.php';

echo '<title>'.$info['title'].' - '.$info['sub-title'].' - '.date("d M, Y  H:i:sA").'</title>';

echo '<div id="top"></div>';

require_once('block-home-menu.php');
require_once('block-home-banner.php');
require_once('block-home-menus.php');
require_once('block-home-top-post.php');
require_once('block-home-about-us.php');
require_once('block-home-contact-us-and-book-table.php');
require_once('block-home-map.php');
require_once('block-home-footer.php');
require 'page-footer.php';