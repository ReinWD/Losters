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
$handler->login($user_name,$password);
?>