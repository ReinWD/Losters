<?php
include 'DataHandler.php';
/**
 * Created by PhpStorm.
 * User: ReinWD
 * Date: 2017/7/31
 * Time: 21:40
 */
//$usr_name = $_POST["usr_name"];
//$password = $_POST["password"];
$usr_name='reinwd';
$password='zhang2wei';
$handler = new DataHandler();
$handler->login($usr_name,$password);