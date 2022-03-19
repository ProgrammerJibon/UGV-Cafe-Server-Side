<?php 
require_once 'functions.php';
$result = array();

if(isset($_POST['admin_pass_enter']) && $admin_pass_enter = $_POST['admin_pass_enter']){
    sleep(5);
    if($info['password'] == $admin_pass_enter){
        $result['login'] = 'reload';
    }else{
        $result['login'] = "Wrong password!";
    }
}

echo json_encode($result);