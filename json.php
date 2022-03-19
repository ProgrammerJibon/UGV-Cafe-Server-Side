<?php 
require_once 'functions.php';
$result = array();

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