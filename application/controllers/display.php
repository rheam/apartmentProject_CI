<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {
	
	 public function __construct() 
	 {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("admin_model");
        $this->load->model("main_model");
       
    }

   
    public function index()
    {
    	$this->load->view('main/template/header/header-login');
		$this->load->view('main/template/navigation');
		$this->load->view('main/login_page');
		$this->load->view('main/template/footer/footer-login');
  	  	
    }


	public function returns()
	{
		$this->load->view('admin/template/header/header-landing');
		$this->load->view('admin/template/navigation');
		$this->load->view('admin/landing_page');
		$this->load->view('admin/template/footer/footer-landing');
	}

	
	public function landing_page()
	{
	
		if ($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type') == 'admin' ) 
		{
			$id = $this->session->userdata('id');
			$data['title'] = "List of all Boarders";
			$data['account'] = $this->main_model->get_account_info($id);
		

			$data['all_user'] = $this->admin_model->boarders_room();
	
			$data['roomlist'] = $this->admin_model->select_room();
			$data['boarders_list'] = $this->admin_model->not_yet_select();


			$this->load->view('admin/template/header/header-landing',$data);
			$this->load->view('admin/template/navigation',$data);	
			$this->load->view('admin/list_of_boarders',$data);
			$this->load->view('admin/template/footer/footer-landing');	
		}

		elseif($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type') == 'boarder' )			
		{

			$id = $this->session->userdata('id');
			$data['title'] = "Landing Page";
			$data['account'] = $this->main_model->get_account_info($id);
			$this->profile_page();
			
			}
			else
			{

			redirect('display');
		}

	}

	public function profile_page()
	{
		
		if ($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type') =='admin'){
			$id = $this->session->userdata('id');
			$data['title'] = "Profile Page";
			$data['account'] = $this->main_model->get_account_info($id);
			$data['income'] = $this->admin_model->calc_income();

			$this->load->view('admin/template/header/header-landing',$data);
			$this->load->view('admin/template/navigation',$data);	
			$this->load->view('admin/admin_profile_page',$data);
			$this->load->view('admin/template/footer/footer-landing');	

		}elseif($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type') =='boarder'){

			$id = $this->session->userdata('id');
			$data['title'] = "Profile Page";
			$data['account'] = $this->main_model->get_account_info($id);
			$data['myroom'] =$this->main_model->getmyroom($id);

			$this->load->view('user/template/header/header-landing',$data);
			$this->load->view('user/template/navigation',$data);	
			$this->load->view('user/user_profile_page',$data);
			$this->load->view('user/template/footer/footer-landing');

		}else{
			redirect('display');
		}
	}

	public function users_page()
	{
		
		if ($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type') == 'admin' ) {

			$id = $this->session->userdata('id');
			$data['title'] = "List of all Boarders";
			$data['account'] = $this->main_model->get_account_info($id);

			$data['all_user'] = $this->admin_model->boarders_room();
	
			$data['roomlist'] = $this->admin_model->select_room();
			$data['boarders_list'] = $this->admin_model->not_yet_select();


			$this->load->view('admin/template/header/header-landing',$data);
			$this->load->view('admin/template/navigation',$data);	
			$this->load->view('admin/list_of_boarders',$data);
			$this->load->view('admin/template/footer/footer-landing');	

		}else{

			redirect('display');

		}
	}



	public function unpaid_boarder_page()
	{
		
		if ($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type') == 'admin' ) {
			$id = $this->session->userdata('id');
			$data['title'] = "Released User";

			$data['account'] = $this->main_model->get_account_info($id);
			 $data['blocked_boarder'] = $this->admin_model->get_blocked_boarders();


			$this->load->view('admin/template/header/header-landing',$data);
			$this->load->view('admin/template/navigation',$data);	
			$this->load->view('admin/unpaid_boarder',$data);
			$this->load->view('admin/template/footer/footer-landing');

		}else{
			redirect('display');	
		}
	}

	public function front_page()
	{
		$this->load->view('main/template/header/header-login');
		$this->load->view('main/login_page');
		$this->load->view('main/template/footer/footer-login');
	}



	public function all_rooms()
	{

		if($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type')=='admin'){
		$id = $this->session->userdata('id');
		$data['title'] ='All_Rooms';
		$data['all_rooms'] = 'All Rooms';
		$data['all_rooms'] = $this->admin_model->get_all_rooms();

		$data['account'] = $this->main_model->get_account_info($id);
		$this->load->view('admin/template/header/header-landing',$data);
		$this->load->view('admin/template/navigation');
		$this->load->view('admin/list_all_rooms',$data);
		$this->load->view('admin/template/footer/footer-landing');

	}else{

		$data['title'] ="Available Rooms";
		$data['all_rooms'] = $this->admin_model->get_all_rooms();


		$this->load->view('main/template/header/header-login');
		$this->load->view('main/template/navigation');
		$this->load->view('main/all_rooms',$data);
		$this->load->view('main/template/footer/footer-login');
		}
	}

	
	public function available_rooms()
	{
		if($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type')=='admin'){
		$id = $this->session->userdata('id');
		$data['title'] ="Available Rooms";
		$data['available_rooms'] = $this->admin_model->select_room();
		$data['account'] = $this->main_model->get_account_info($id);


		$this->load->view('admin/template/header/header-landing');
		$this->load->view('admin/template/navigation',$data);
		$this->load->view('admin/list_available_rooms',$data);
		$this->load->view('admin/template/footer/footer-landing');

	}else{
		$data['title'] ="Available Rooms";
		$data['available_rooms'] = $this->admin_model->select_room();


		$this->load->view('main/template/header/header-login');
		$this->load->view('main/template/navigation');
		$this->load->view('main/available_rooms',$data);
		$this->load->view('main/template/footer/footer-login');
		}
	}


	public function not_available_rooms()
	{

	if($this->session->userdata('is_logged_in') == 1 && $this->session->userdata('user_type')=='admin'){
		$id = $this->session->userdata('id');
		$data['title'] ="Unavailable Rooms";
		$data['account'] = $this->main_model->get_account_info($id);
		$data['not_available_rooms'] = $this->admin_model->not_available_rooms();
		$this->load->view('admin/template/header/header-landing');
		$this->load->view('admin/template/navigation',$data);
		$this->load->view('admin/not_available_rooms',$data);
		$this->load->view('admin/template/footer/footer-landing');
	}else{
		redirect('display');
	}
	
}


}