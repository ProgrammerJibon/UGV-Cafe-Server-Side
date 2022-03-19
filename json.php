<?php 
require_once 'functions.php';
$result = array();




if (isset($_SESSION['user_admin']) && $_SESSION['user_admin'] == "45646546545sd45f64sa65d45ds4f564sad5f45a315sd4f564as521dc451fs5d1f564asdf564as5df15ew64r54") {
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