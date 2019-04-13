<?php

class Mconfig extends CI_Model {
	protected $_table="ms_config";
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getDesc($key){
        $this->db->where("key",$key);
        $query = $this->db->get($this->_table);
        if($query->num_rows()==0){
            return -1;
        }
        else{
             return $query->result();
        }
    }

}