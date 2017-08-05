<?php
include_once 'SQLmanager.php';
include_once 'UserRequest.php';
/**
 * Created by PhpStorm.
 * User: ReinWD
 * Date: 2017/8/2
 * Time: 16:04
 */
class DataHandler{
    var $auth;
    var $usr_id;
    var $user_requests;
    private $queryer;

    function __construct(){
        $this->queryer = new SQLmanager();
    }



    function login($usr_name, $passwd){
        //从数据库取得密码
        $mysqli_result = $this->queryer->query('select uid, password from accounts where account = \''.$usr_name.'\'');
        switch ($mysqli_result->num_rows){
            case 0:
                $this->onLoginFailure();
                break;
            case 1:
                $account_info=$mysqli_result->fetch_assoc();
                $hash=$account_info['password'];
                if(password_verify($passwd,$hash))
                    $this->onLoginSuccess($account_info);
                else
                    $this->onLoginFailure();
                //todo: fetch UserRequest
                break;
            default:
                //todo: warn log.
        }
    }

    private function onLoginFailure(){
        $this->auth=false;
        echo $this->get_data();
    }

    private function onLoginSuccess($result){
        $this->auth = true;
        $this->usr_id = $result['uid'];
        echo $this->get_data();
    }

    function register($usr_name,$passwd){
        $exists=$this->queryer->query('select uid from accounts where account =\''.$usr_name.'\'');
        switch($exists->num_rows){
            case 0:
                $passwd = password_hash($passwd,1);
                $query_add_user=
                    'insert into accounts (account,password,uid) values (\''.$usr_name.'\',\''.$passwd.'\',password(\''.$usr_name.'\'))';
                $this->queryer->query($query_add_user);
                return true;
            case 1:
                return false;
                break;
            default:
                return false;
        }
       }

    private function get_data(){
            return json_encode($this);
    }

};