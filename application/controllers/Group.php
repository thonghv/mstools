<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$this->load->Model('Mcategory');
		$data=array(
			'group' => $this->Mcategory->getGroup(),			
		);
		$this->load->view('admin/Group', $data);
	}

	public function insert()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

        $data = array(
			'name' => $this->input->post("name"),
	    );
	    $this->load->Model('Mcategory');
		$this->Mcategory->addGroup($data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."group");
	}

	public function remove($id)
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

        $this->load->model('Mcategory');
		$this->Mcategory->removeGroup($id);
		redirect(base_url()."group");
    }


    public function change($id)
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$this->load->Model('Mmusic');
		$data = array(
			'info' => $this->Mmusic->getGroupById($id),
	    );
	    
		$this->load->view('admin/UpdateGroup', $data);
	}

	public function submitChange()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

        $data = array(
			'name' => $this->input->post("name"),
	    );
	    $this->load->Model('Mmusic');
		$this->Mmusic->updateGroup($this->input->post("id"), $data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."group");
	}


	public function detail()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$group = $this->input->get('id', TRUE);

		$this->load->Model('Mmusic');
		$data=array(
			'musics' => $this->Mmusic->getCategoryByGroupId($group),
			'group' => $this->Mmusic->getGroupById($group),			
		);
		$this->load->view('admin/GroupDetail', $data);
	}

	public function add()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$group = $this->input->get('id', TRUE);
		$this->load->Model('Mmusic');
		$data=array(
			'category' => $this->Mmusic->getCategoryAll($group),
			'group' => $this->Mmusic->getGroupById($group),
		);
		$this->load->view('admin/GroupAdd', $data);
	}

	public function removeDetail($groupId, $categoryId)
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$groupId = $this->input->get('group_id', TRUE);
		$categoryId = $this->input->get('category_id', TRUE);
        $this->load->model('Mmusic');
		$this->Mmusic->removeGroupDetail($groupId, $categoryId);
		redirect(base_url()."group/detail?id=".$groupId);
    }

    public function submitAddDetail()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }
        
		$groupId = $this->input->get('id', TRUE);
        $data = array(
			'category_id' => $this->input->post("category"),
			'group_id' => $groupId,
	    );
	    $this->load->Model('Mmusic');
		$this->Mmusic->addGroupDetail($data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."group/detail?id=".$groupId);
	}

	public function api()
	{	
		$groupId = $this->input->get('group_id', TRUE);
		$this->load->Model('Mmusic');
		
		$groupInfo = $this->Mmusic->getGroupById($groupId);

		$foo = array();
		$category = $this->Mmusic->getCategory($groupId);
		foreach ($category as $value) {
			$category = $value -> id;
			$dataCategory=array(
				$value -> name => $this->Mmusic->getByCategory($category),
			);

	    	array_push($foo,  $dataCategory);
		}

		$data=array(
			$groupInfo[0] -> name => $foo,
		);
		
		$myJSON = json_encode($data);
		echo $myJSON;
	}
}