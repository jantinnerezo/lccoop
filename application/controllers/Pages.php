<?php


class Pages extends CI_Controller{

	public function view($page = 'home'){

		 if($this->session->userdata('logged_in')){

		 	if($this->session->userdata('user_type') == 1){

				redirect('admin');

			}else{

				redirect('profile');
			}

		


		}else{
			redirect('login');
		}
	}
}

?>