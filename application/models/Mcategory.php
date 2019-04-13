<?php
class Mcategory extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /* Lay danh sach all  */
    public function getAll(){
        $query=$this->db->query('SELECT *FROM ms_category');
        return $query->result();
    }

    /* add category */
    public function addCategory($data){
        $this->db->insert("ms_category",$data); 
        return $this->db->insert_id();  
    }

    /* remove */
    public function removeCategory($id){
        $this->db->where("id",$id);
        $this->db->delete("ms_category");
    }

    /* remove */
    public function removeCategoryGroup($id){
        $this->db->where("category_id",$id);
        $this->db->delete("ms_group_detail");
    }

     /* Lay danh sach all  */
    public function getGroup(){
        $query=$this->db->query('SELECT *FROM ms_group');
        return $query->result();
    }

     /* add bai group */
    public function addGroup($data){
        $this->db->insert("ms_group",$data); 
        return $this->db->insert_id();  
    }

    /* remove */
    public function removeGroup($id){
        $this->db->where("id",$id);
        $this->db->delete("ms_group");
    }

 }