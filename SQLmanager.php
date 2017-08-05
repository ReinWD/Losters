<?php
/**
 * Created by PhpStorm.
 * User: ReinWD
 * Date: 2017/8/2
 * Time: 14:35
 */
class SQLmanager{
    private $conn;
    function __construct(){
        $user = fopen("/etc/usr/sql.usr","r");
        $usr = fgets($user);
        $passwd = fgets($user);
        $this->conn = new mysqli("localhost",$usr,$passwd,'losters');
        $usr=null;
        $passwd=null;
        if($this->conn->connection_error){echo 'database failed';}
    }

    function query($query){
        return $this->conn->query($query);
    }

    function __destruct(){
        $this->conn = null;
    }
}