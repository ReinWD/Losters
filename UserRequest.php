<?php

/**
 * used to store a lost&found request
 * Created by PhpStorm.
 * User: ReinWD
 * Date: 2017/8/2
 * Time: 16:14
 */
class UserRequest{
    var $type;
    var $create_time;
    var $update_time;
    var $item_name;
    var $location;
    var $other_inf;

    function __construct($type, $create_time, $update_time, $item_name, $location, $other_inf){
        $this->type = $type;
        $this->create_time = $create_time;
        $this->update_time = $update_time;
        $this->item_name = $item_name;
        $this->location = $location;
        $this->other_inf = $other_inf;
    }

    /**
     * @return string
     * loster: request by someone who lost something;
     * founder: request by someone who found something;
     */
    public function getType(){return $this->type;}
    public function getUpdateTime(){return $this->update_time;}
    public function setUpdateTime($update_time){$this->update_time = $update_time;}
    public function get_create_time(){return $this->create_time;}
    public function getItemName(){return $this->item_name;}
    public function setItemName($item_name){$this->item_name = $item_name;}
    public function getLocation(){return $this->location;}
    public function setLocation($location){$this->location = $location;}
    public function getOtherInf(){return $this->other_inf;}
    public function setOtherInf($other_inf){$this->other_inf = $other_inf;}
}