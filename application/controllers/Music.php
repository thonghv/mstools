<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
	{	
		$this->load->Model('Mmusic');
		$data=array(
			'musics' => $this->Mmusic->getAll(),
		);
		$this->load->view('admin/Music', $data);
	}

	public function add()
	{	
		$this->load->Model('Mmusic');
		$data=array(
			'category' => $this->Mmusic->getCategory(),
			'group' => $this->Mmusic->getAllGroup(),
		);
		$this->load->view('admin/Add', $data);
	}

	public function insert()
	{	

		
        $data = array(
			'name' => $this->input->post("name"),
			'author' => $this->input->post("author"),
			'img_url' => $this->input->post("image"),
			'stream_url' => $this->input->post("stream"),
			'likes' => $this->input->post("like"),
			'views' => $this->input->post("view"),
			'category' => $this->input->post("category"),
			'group_id' => $this->input->post("group"),
	    );
	    $this->load->Model('Mmusic');
		$this->Mmusic->addMusic($data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."category/detail?id=".$id);
	}

	public function getAll()
	{	
		$groupId = $this->input->get('group_id', TRUE);
		$this->load->Model('Mmusic');
		
		$foo = array();
		$category = $this->Mmusic->getCategory();
		foreach ($category as $value) {
			$category = $value -> id;
			$dataCategory=array(
				$value -> name => $this->Mmusic->getByCategory($category, $groupId),
			);

	    	array_push($foo,  $dataCategory);
		}

		$data=array(
			'musics' => $foo,
		);
		
		$myJSON = json_encode($data);
		echo $myJSON;
	}

	public function getByCategory()
	{	
		$groupId = $this->input->get('group_id', TRUE);
		$categoryId = $this->input->get('category_id', TRUE);

		$this->load->Model('Mmusic');
		$data=array(
			'musics' => $this->Mmusic->getByCategory($categoryId, $groupId),
		);
		
		$myJSON = json_encode($data);
		echo $myJSON;
	}

	

}