<?php


class Login extends CI_Controller{

	public function index(){

			$data['title'] = 'Login';

			$this->load->view('includes/header');
			$this->load->view('login/index', $data);
			$this->load->view('includes/footer');
	}

}