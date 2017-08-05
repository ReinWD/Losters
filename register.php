<?php
include 'DataHandler.php';
/**
 * Created by PhpStorm.
 * User: ReinWD
 * Date: 2017/8/5
 * Time: 14:21
 */
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$handler = new DataHandler();
if($user_name!=null&&$password!=null){
if($handler->register($user_name,$password))echo 'success';
else echo 'fail';
}else echo 'insufficient params';
?>