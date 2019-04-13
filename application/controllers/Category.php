<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
	{	if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$this->load->Model('Mcategory');
		$data=array(
			'category' => $this->Mcategory->getAll(),			
		);
		$this->load->view('admin/Category', $data);
	}

 	public function detail()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$category = $this->input->get('id', TRUE);

		$this->load->Model('Mmusic');
		$data=array(
			'musics' => $this->Mmusic->getSongInfoByCategory($category),
			'category' => $this->Mmusic->getCategoryById($category),			
		);
		$this->load->view('admin/Music', $data);
	}

	public function add()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$category = $this->input->get('id', TRUE);
		$this->load->Model('Mmusic');
		$data=array(
			'category' => $this->Mmusic->getCategoryById($category),
		);
		$this->load->view('admin/Add', $data);
	}

	public function insertSong()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$id = $this->input->post("category");
        $data = array(
			'name' => $this->input->post("name"),
			'author' => $this->input->post("author"),
			'img_url' => $this->input->post("image"),
			'stream_url' => $this->input->post("stream"),
			'likes' => $this->input->post("like"),
			'views' => $this->input->post("view"),
			'category' => $this->input->post("category"),
	    );
	    $this->load->Model('Mmusic');
		$this->Mmusic->addMusic($data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."category/detail?id=".$id);
	}

	public function removeSong($id)
	{	if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$id = $this->input->get('id', TRUE);
		$category = $this->input->get('category', TRUE);
        $this->load->model('Mmusic');
		$this->Mmusic->remove($id);
		redirect(base_url()."category/detail?id=".$category);
    }

    public function update()
	{	if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$category = $this->input->get('category', TRUE);
		$id = $this->input->get('id', TRUE);
		$this->load->Model('Mmusic');
		$data=array(
			'category' => $this->Mmusic->getCategoryById($category),
			'info' => $this->Mmusic->getSongInfoById($id),
		);
		$this->load->view('admin/Update', $data);
	}

	public function updateSong()
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$id = $this->input->post("category");
        $data = array(
			'name' => $this->input->post("name"),
			'author' => $this->input->post("author"),
			'img_url' => $this->input->post("image"),
			'stream_url' => $this->input->post("stream"),
			'likes' => $this->input->post("like"),
			'views' => $this->input->post("view"),
	    );
	    $this->load->Model('Mmusic');
		$this->Mmusic->updateSong($this->input->post("id"), $data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."category/detail?id=".$id);
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
		$this->Mcategory->addCategory($data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."category");
	}

	public function remove($id)
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

        $this->load->model('Mcategory');
		$this->Mcategory->removeCategory($id);
		$this->Mcategory->removeCategoryGroup($id);
		redirect(base_url()."category");
    }

    public function change($id)
	{	
		if($this->session->userdata('name_admin') == NULL)
        {
			redirect(base_url()."login");
        }

		$this->load->Model('Mmusic');
		$data = array(
			'info' => $this->Mmusic->getCategoryById($id),
	    );
	    
		$this->load->view('admin/UpdateCategory', $data);
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
		$this->Mmusic->updateCategory($this->input->post("id"), $data);

		$data['success']="OK";             
        $this->session->set_userdata($data);

		redirect(base_url()."category");
	}
}