<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	
	public function __construct() 
	{

        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("admin_model");
        $this->load->model("main_model");     
    }


    public function login_validation()
	{
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_password_login_check');
	

		if ($this->form_validation->run() == FALSE){

			redirect('display');

		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$get_data = $this->main_model->model_signin($username,md5($password));
			if ($get_data){
				if($get_data[0]->payment_status !== 'blocked'){
				$session = array('is_logged_in'=> 1);
				$login_data = array(
				'id'    			=> $get_data[0]->id,
				'username'   		=> $get_data[0]->username,
				'firstname'  		=> $get_data[0]->firstname,
				'lastname'  		=> $get_data[0]->lastname,
				'gender'  			=> $get_data[0]->gender,
				'contact'  			=> $get_data[0]->contact,
				'user_type' 		=> $get_data[0]->user_type,
				'payment_status' 	=> $get_data[0]->payment_status
				);

				$this->session->set_userdata($session);
				$this->session->set_userdata($login_data);

				redirect('display/landing_page');

				}else{
				redirect('display');
				}
			}else{
			redirect('display');
			}	
		}
	}


	public function password_login_check($password)
	{
		$username = $this->input->post('username');
		$password = md5($password);
		$check = $this->main_model->check_username($username);
		$result = $this->main_model->check_password($username, $password);
		if($result){
			return TRUE;
		}
		$this->form_validation->set_message('password_login_check', 'INVALID USERNAME OR PASSWORD');
		
		return FALSE;
	}


    public function do_reg()
    {

    	$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

    	$this->form_validation->set_rules('firtsname','firstname','trim|xss_clean|callback_alpha_space_only');
		$this->form_validation->set_rules('lastname','lastname','trim');
		$this->form_validation->set_rules('username','username','trim|xss_clean');
		$this->form_validation->set_rules('gender', 'gender','required');
		$this->form_validation->set_rules('contact', 'contact','trim|xss_clean');

		if ($this->form_validation->run() == FALSE){

			redirect('display/returns');

		}else{

	        $firstname    = ucwords($this->input->post('firstname'));
	        $lastname    = ucwords($this->input->post('lastname'));
	        $gender= $this->input->post('gender');
	        $contact = $this->input->post('contact');
	        $username = $this->input->post('username');
	        $password = md5($this->input->post('password'));
	      
    		$confirm  = $this->main_model->do_register($firstname, $lastname ,$gender,$contact,$username ,$password );
								
			redirect('display/users_page');			
		
		}
	}


    
   	public function logout()
	{

		session_unset();
		session_destroy();	
		
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('display');
	}


	public function disable_user($id)
	{

		$this->admin_model->disable($id);		
		redirect('display/users_page');
	}


	public function paid_boarder($id)
	{

		$this->admin_model->active($id);		
		redirect('display/users_page');
	}

	public function block_boarder($id)
	{

		$this->admin_model->block($id);		
		redirect('display/users_page');
	}


	public function update_profile()

	{

		$username  = 	$this->input->post('username');
		$firstname = 	$this->input->post('firstname');
		$lastname  = 	$this->input->post('lastname');
		$password  = md5($this->input->post('password'));

		$ret  = $this->admin_model->do_update($firstname, $lastname, $username, $password);
		redirect('display/profile_page');

	}


	public function do_reserve($roomid)
	{

	$this->main_model->do_reserve($roomid);	
	redirect('display/available_rooms');

	}
	

	public function do_unreserve($roomid)
	{

	$this->main_model->do_unreserve($roomid);	
	redirect('display/not_available_rooms');

	}

	public function addroom()
	{

    	$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('room_number','room_number','required|trim');
		$this->form_validation->set_rules('price','price','required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			// $this->load->view('admin/template/header/header-landing');
			// $this->load->view('admin/template/navigation');
			// $this->load->view('admin/landing_page');
			// $this->load->view('admin/template/footer/footer-landing');
			redirect('display/returns');
		}
		else
		{
			$room_number = $this->input->post('room_number');
			$price = $this->input->post('price');

			$confirm  = $this->admin_model->model_addroom($room_number,$price);

		redirect('display/all_rooms');
		}
	}



	public function savemyroom() 
	{
		$data = array(		
			'id'     => $this->input->post('id',true),            
            'roomid' => $this->input->post('roomid',true),       
        );
	
        $this->main_model->choosen_room($data);
		redirect('display/users_page');
	}

	public function delete($id)
	{
	$this->admin_model->tobedelete($id);
	redirect('display/unpaid_boarder_page');

	}

}




	
