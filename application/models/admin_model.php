<?php

class Admin_model extends CI_Model{
	

	public function tobedelete($id){

		$this->db->where('id', $id);
        $this->db->delete('boardersroom');
        return $this->db->affected_rows() ? true : false;

	}

	public function get_blocked_boarders()
	{
	$query = $this->db->query("SELECT user.id,firstname,lastname,room_number,payment_status,dateofreg 
from user,rooms,boardersroom
where boardersroom.roomid = rooms.roomid and boardersroom.id = user.id
and payment_status = 'blocked'");
	return $query->result();

	}


	public function get_all_boarder()
	{
	$query = $this->db->query("SELECT * from user where payment_status = 'paid' OR payment_status = 'unpaid' AND user_type != 'admin'");
	return $query->result();
	}
	public function boarders_room()
	{
	$query = $this->db->query("SELECT user.contact,rooms.price,
		rooms.room_number,
		user.username,
		user.id,
		user.firstname,
		user.lastname,user.dateofreg,
		user.payment_status 
		from user,rooms,boardersroom
		where boardersroom.roomid = rooms.roomid 
		and boardersroom.id=user.id 
		and user.payment_status != 'blocked' and user_type!='admin'");
	return $query->result();
	}


	public function not_yet_select()
	{
		$query = $this->db->query("SELECT id, firstname, lastname from user where id NOT IN 
(select user.id from boardersroom,user,rooms where user.id = boardersroom.id and user_type !='blocked')");
		return $query->result();
	}


	public function get_all_paid_boarder()
	{
		$this->db->select('*');
		$this->db->order_by('dateofreg','desc');	
		$query = $this->db->get_where('user', array('user_type'=>'boarder',
													'payment_status' => 'paid'));
		return $query->result();
	}


	public function get_all_unpaid_boarder()
	{
		$this->db->select('*');
		$this->db->order_by('dateofreg','asc');
		$query = $this->db->get_where('user', array('user_type'=>'boarder',
													'payment_status' => 'unpaid'));
		return $query->result();
	}


	public function disable($id)
	{
		$this->db->where('id',$id);
		$this->db->update('user',array('payment_status' => 'unpaid'));
	}

	public function block($id)
	{
		$this->db->where('id',$id);
		$this->db->update('user',array('payment_status' => 'blocked'));
	}

	public function active($id) 
	{
		$this->db->where('id',$id);
		$this->db->update('user',array('payment_status' => 'paid'));
	}

	
	public function do_update($firstname, $lastname, $username ,$password)
	{
		$id = $this->session->userdata('id');
		$data = array(
			'firstname' => $firstname,
			'lastname' =>  $lastname,
			'username' =>  $username,
			'password' =>  $password
			);
		$this->db->where('id', $id);
		$query = $this->db->update('user',$data);


		if($query)
			return true;
		else
			return false;
	}


	public function get_all_rooms()
	{
		
		$query = $this->db->get('rooms');

		if($query->num_rows()>0){
		return $query->result();
		}else{
			return false;
		}
	}


	public function get_available_rooms()
	{
		
		$query = $this->db->get_where('rooms',array('rooms_status' => 'available' ));

		if($query->num_rows() > 0){
			return $query->result();
			}
			else
			{
			return false;
			}
			
	}


	public function select_room()
	{
		$query = $this->db->query("SELECT roomid,room_number,price,rooms_status from rooms where roomid NOT IN (select roomid from boardersroom, user where user.id = boardersroom.id and boardersroom.roomid = rooms.roomid)");
		return $query->result();
	}
	

	public function not_available_rooms()
	{
	$query = $this->db->query("SELECT roomid,room_number,price,rooms_status from rooms where roomid IN (select roomid from boardersroom,user where user.id = boardersroom.id and boardersroom.roomid = rooms.roomid)");
		return $query->result();
	}


	public function model_addroom($room_number,$price)
	{
		$data = array('room_number' => $room_number,
						'price'    => $price);

		$query = $this->db->insert('rooms',$data);
		return $this->db->affected_rows() ? true :false;
		
	}
	

	public function calc_income()
	{
		$query = $this->db->query("CALL calc_rent()");
		return $query->result();

	}
	

}