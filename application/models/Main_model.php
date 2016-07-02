<?php

class Main_model extends CI_Model{

	function _construct()
	{

	parent::_construct();
	}


	public function do_register($firstname, $lastname,$gender ,$contact, $username )
	{
		$data = array(		
				'firstname' =>  $firstname,
				'lastname' 	=>  $lastname,
				'gender' 	=> $gender,
				'contact' 	=>$contact,
				'username' 	=>  $username,
				'password' 	=>  md5($password ='apartment'),
				'username' 	=>  $username,
				'user_type' =>  'boarder'
				);

		$query = $this->db->insert('user',$data);
		$this->db->affected_rows()? true: false;
	}
	

	public function select_username($username)
	{
		$this->db->select('username');
		$q = $this->db->get_where('user',array('username' => $username));
		
		return $q->result();
	}

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->select('*');
		$query = $this->db->get_where('user',array('username' => $username, 'password' => $password));
		return $query->result();
	}


	public function check_username($username)
	{
 		$this->db->select("id");
 		$query = $this->db->get_where('user', array('username' => $username));
 		if($query->num_rows()>0){
 			return $query->result();
 		}else{
 			return FALSE;
 		}
 	}


 	public function check_password($username, $password)
 	{
 		$this->db->select("id");
 		$query = $this->db->get_where('user', array('username' => $username, 'password' => $password));
 		if($query->num_rows()>0){
 			return $query->result();
 		}else{
 			return FALSE;
 		}
 	}


 	public function model_signin($username, $password)

    {
       	$query = $this->db->select('*')
                          ->from('user')
                          ->where('username', $username) 
                          ->where('password', $password)                                           
                          ->get();
         
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        } 
    }


    public function get_account_info($id)
	{
		
		$this->db->select('id,gender,contact,firstname,lastname,username,user_type,payment_status,dateofreg');
		$this->db->from('user');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->result();	
	}


	public function do_reserve($roomid)
	{
	
		$this->db->where('roomid',$roomid);
		$this->db->update('rooms',array('rooms_status' => 'occupied'));		
	}


	public function do_unreserve($roomid)
	{

		$this->db->where('roomid',$roomid);
		$this->db->update('rooms',array('rooms_status' => 'available'));		
	}


	public function choosen_room($data) 
	{
	
		$query = $this->db->insert('boardersroom',$data);
		$this->db->affected_rows()? true: false;
	}


	public function getmyroom($id)
	{
		
		$query=$this->db->select('*')
						->from('boardersroom')
						->join('rooms', 'rooms.roomid = boardersroom.roomid')				
						->where('id',$id)
						->get();
        return $query->result();
       }



}
