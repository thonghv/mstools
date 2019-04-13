<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

	public function index(){
		if($this->session->userdata('name_admin')==NULL)
		{
			$this->load->view("admin/Login");
		}
		else redirect(base_url()."admin/home");
	}

	public function checklogin(){                           
        $username = $this->input->post("Username");
		$password = $this->input->post("Password");

		$this->load->Model('Mconfig');
		$userNameAdmin = "config.web.username.admin";
		$dataNameAdmin = $this->Mconfig->getDesc($userNameAdmin);

		$userPasswordAdmin = "config.web.username.password";
		$dataPassWordAdmin = $this->Mconfig->getDesc($userPasswordAdmin);

		if($username != $dataNameAdmin[0]->desc || md5($password) != $dataPassWordAdmin[0]->desc){
			$data['error']="Đăng nhập không thành công. Vui lòng đăng nhập lại !";
		}
		else{
			$data = array(
				"name_admin" => 'admin',			
			);
			$this->session->set_userdata($data);
			redirect(base_url()."group");
		}
		$this->load->view("admin/Login",$data);
	}
	
	public function logout(){
		$this->session->unset_userdata('name_admin');
		redirect(base_url()."login");
	}


}