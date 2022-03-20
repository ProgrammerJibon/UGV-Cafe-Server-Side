<?php 
require_once 'functions.php';
$result = array();




if (isset($_SESSION['user_admin']) && $_SESSION['user_admin'] == "45646546545sd45f64sa65d45ds4f564sad5f45a315sd4f564as521dc451fs5d1f564asdf564as5df15ew64r54") {

    if(isset($_POST['news_letter_email'])){
        $sql_newsletter_mails = "SELECT * FROM `subscribed` ORDER BY `subscribed`.`id` DESC";
        $sql_newsletter_mails = mysqli_query($connect, $sql_newsletter_mails);
        foreach ($sql_newsletter_mails as $sql_newsletter_mail) {
            sent_mail($sql_newsletter_mail['email'], "", addslashes($_POST['news_letter_email']), addslashes($_POST['news_letter_title']));
        }
        header("Location: /admin?p=5&sent=".addslashes($_POST['news_letter_title']));
    }

    if(isset($_POST['delete_newsletter_email'])){
        if(mysqli_query($connect, "DELETE FROM `subscribed` WHERE `subscribed`.`id` = '$_POST[delete_newsletter_email]'")){
            header("Location: /admin?p=5");
        }else{
            $result['add_menu_item']['error'] = mysqli_error($connect);
        }
    }

    if(isset($_POST['add_menu_item']) && isset($_FILES['cover'])){
        if($_FILES['cover']['size'] > 0){
            $cover_path = upload($_FILES['cover']['tmp_name'], 'image');
        }
        if(isset($cover_path) && mysqli_query($connect, "INSERT INTO `menu_items` (`id`, `name`, `pic`, `menu_cats_id`, `price`, `comment`, `time`) VALUES (NULL, '$_POST[name]', '$cover_path', '$_POST[cat]', '$_POST[price]', '$_POST[comment]', '$time')")){
            header("Location: /admin?p=1&cat=$_POST[cat]");
        }else{
            if(!isset($cover_path)){
                $result['add_menu_item']['error'] = "Select a correct image file";
            }else{
                $result['add_menu_item']['error'] = mysqli_error($connect);
            }
        }
    }

    if (isset($_POST['update_menu_item'])) {
        $menu_item_cover = "";
        if(isset($_FILES['cover']) && $_FILES['cover']['size'] > 0){
            if($menu_item_cover = upload($_FILES['cover']['tmp_name'])){
                $menu_item_cover = ", `pic` = '$menu_item_cover'";
            }
            $result['file'] = $_FILES;
        }
        $_POST['cat'] = (int) $_POST['cat'];
        if($menu_update_query = mysqli_query($connect, "UPDATE `menu_items` SET `name` = '$_POST[name]' $menu_item_cover , `price` = '$_POST[price]', `comment` = '$_POST[comment] ', `menu_cats_id` = '$_POST[cat]', `time` = '$time' WHERE `menu_items`.`id` = '$_POST[update_menu_item]'")){
            header("Location: /admin?p=1&cat=$_POST[cat]");
        }else{
            $result['update_menu_item']['error'] = "Try again letter";
        }
        $result['update_menu_item'] = $_POST;
    }

    if(isset($_POST['add_cat_name'])){
        if(strlen($_POST['add_cat_name']) > 0 && mysqli_query($connect, "INSERT INTO `menu_cats` (`id`, `name`, `pic`, `time`) VALUES (NULL, '$_POST[add_cat_name]', '', '$time')")){
            $result['add_cat_name'] = true;
        }else{
            $result['add_cat_name'] = false;
        }
    }


    if(isset($_POST['edit_cat_name'])){
        if(strlen($_POST['set']) > 0 && mysqli_query($connect, "UPDATE `menu_cats` SET `name` = '$_POST[set]' WHERE `menu_cats`.`id` = '$_POST[edit_cat_name]'")){
            $result['edit_cat_name'] = true;
        }else{
            $result['edit_cat_name'] = false;
        }
    }


    if(isset($_POST['delete_cat_name'])){
        if(strlen($_POST['delete_cat_name']) > 0 && mysqli_query($connect, "DELETE FROM `menu_cats` WHERE `menu_cats`.`id` = '$_POST[delete_cat_name]'")){
            $result['delete_cat_name'] = true;
        }else{
            $result['delete_cat_name'] = false;
        }
    }


    
    if (isset($_FILES['logo_change']['tmp_name'])) {
        if($file_name = upload($_FILES['logo_change']['tmp_name'], "image")){
            if (mysqli_query($connect, "UPDATE `info` SET `value` = '$file_name' WHERE `info`.`name` = 'logo'")) {
                header("Location: /admin?p=3");
                exit;
            }else{
                exit("Can't save to database! Try letter...");
            }
        }
       
    }
    if (isset($_FILES['home_page_banner_1']['tmp_name'])) {
        if($file_name = upload($_FILES['home_page_banner_1']['tmp_name'], "image")){
            if (mysqli_query($connect, "UPDATE `info` SET `value` = '$file_name' WHERE `info`.`name` = 'home-block-bg-1'")) {
                header("Location: /admin?p=3");
                exit;
            }else{
                exit("Can't save to database! Try letter...");
            }
        }
       
    }
    if (isset($_FILES['home_page_banner_2']['tmp_name'])) {
        if($file_name = upload($_FILES['home_page_banner_2']['tmp_name'], "image")){
            if (mysqli_query($connect, "UPDATE `info` SET `value` = '$file_name' WHERE `info`.`name` = 'home-block-bg-2'")) {
                header("Location: /admin?p=3");
                exit;
            }else{
                exit("Can't save to database! Try letter...");
            }
        }
       
    }
    if (isset($_POST['change_text_settings']) && isset($_POST['name']) && isset($_POST['value']) && $_POST['name'] != "" && $_POST['value'] != "") {
		if (isset($_POST['is_pass']) && $_POST['is_pass'] == "pass") {
			$_POST['value'] = md5($_POST['value']);
		}
		if (@mysqli_query($connect, "UPDATE `info` SET `value` = '$_POST[value]' WHERE `info`.`name` = '$_POST[name]'")) {
			$result['settings_changed'] = "Successfully updated!";
		}else{
			$result['settings_changed'] = "Something went wrong!";
		}
	}
}





if(isset($_POST['newsletter_subscription'])){
    if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `subscribed` WHERE `email` LIKE '$_POST[newsletter_subscription]'")) == 0){
        if(mysqli_query($connect, "INSERT INTO `subscribed` (`id`, `email`, `ip`, `time`) VALUES (NULL, '$_POST[newsletter_subscription]', '$ip', '$time')")){
            $result['newsletter_subscription'] = "Succesfully subscribed!";
        }
    }else{
        $result['newsletter_subscription'] = "Already Subscribed!";
    }
}

if(isset($_POST['admin_pass_enter']) && $admin_pass_enter = $_POST['admin_pass_enter']){
    if($info['password'] == md5($admin_pass_enter)){
        $_SESSION['user_admin'] = '45646546545sd45f64sa65d45ds4f564sad5f45a315sd4f564as521dc451fs5d1f564asdf564as5df15ew64r54';
        $result['login'] = 'reload';
    }else{
        sleep(10);
        $result['login'] = "Wrong password!";
    }
}


if(isset($_POST['menus'])){
    $result['menu_cats'] = array();
    if($menu_cat = mysqli_query($connect, "SELECT * FROM `menu_cats` ORDER BY `menu_cats`.`id` DESC")){
        foreach($menu_cat as $key){
            $result['menu_cats'][] = $key;
        }
    }
    $result['menu_items'] = array();
    if($menu_cat = mysqli_query($connect, "SELECT * FROM `menu_items` ORDER BY `menu_items`.`id` DESC")){
        foreach($menu_cat as $key){
            $result['menu_items'][] = $key;
        }
    }
}

echo json_encode($result);