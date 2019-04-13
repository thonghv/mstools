<?php
class Mmusic extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /* Lay danh sach  bai hat theo category */
    public function getSongInfoByCategory($category){
        $query=$this->db->query('SELECT *FROM ms_article WHERE category='.$category.' ORDER BY created DESC');
        return $query->result();
    }

    /* Lay thong tin category theo id*/
    public function getCategoryById($id){
        $query=$this->db->query('SELECT *FROM ms_category WHERE id='.$id);
        return $query->result();
    }

     /* Lay thong tin song theo id*/
    public function getSongInfoById($id){
        $query=$this->db->query('SELECT *FROM ms_article WHERE id='.$id);
        return $query->result();
    }

    public function updateSong($id, $data){
        $this->db->where("id", $id); 
        $this->db->update("ms_article", $data);
    }

    public function updateCategory($id, $data){
        $this->db->where("id", $id); 
        $this->db->update("ms_category", $data);
    }

    public function updateGroup($id, $data){
        $this->db->where("id", $id); 
        $this->db->update("ms_group", $data);
    }

    /* Lay thong tin group theo id*/
    public function getGroupById($id){
        $query=$this->db->query('SELECT *FROM ms_group WHERE id='.$id);
        return $query->result();
    }

     /* Lay thong tin category theo group id*/
    public function getCategoryByGroupId($id){
        $query=$this->db->query('SELECT a.id, a.group_id, a.category_id, b.name FROM ms_group_detail a, ms_category b WHERE a.category_id = b.id AND  a.group_id='.$id);
        return $query->result();
    }


    /* Lay danh sach  bai hat theo category */
    public function getCategoryAll($id){
        $query=$this->db->query('SELECT *FROM ms_category WHERE id not in (SELECT category_id FROM ms_group_detail WHERE group_id ='.$id.')');
        return $query->result();
    }


    /* remove */
    public function removeGroupDetail($groupId, $categoryId){
        $this->db->where("group_id", $groupId);
        $this->db->where("category_id", $categoryId);
        $this->db->delete("ms_group_detail");
    }

    /* add category into group */
    public function addGroupDetail($data){
        $this->db->insert("ms_group_detail",$data); 
        return $this->db->insert_id();  
    }


     /* Lay data json  */
    public function getByCategory($category){
        $query=$this->db->query('SELECT *FROM ms_article WHERE category = '.$category);
        return $query->result();
    }



    /* Lay danh sach all  */
    public function getCategory($groupId){
        $query=$this->db->query('SELECT b.id, b.name FROM ms_group_detail a,  ms_category b WHERE a.category_id = b.id AND a.group_id ='.$groupId);
        return $query->result();
    }


    /* add bai hat moi */
    public function addMusic($data){
        $this->db->insert("ms_article",$data); 
        return $this->db->insert_id();  
    }


    /* remove */
    public function remove($id){
        $this->db->where("id",$id);
        $this->db->delete("ms_article");
    }

    /* Lay danh sach all  group */
    public function getAllGroup(){
        $query=$this->db->query('SELECT *FROM ms_group');
        return $query->result();
    }

 }