<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionModel extends CI_Model {

	public function checkUser($email, $password)
	{
		$query = $this->db->query("select * from testa where email='$email' and mdp='$password'");
		$row = $query->row_array();
		if($row){
			$this->load->library('session');
			$this->session;
			$this->session->set_userdata('huhu', $row);
			return true;
		}
		return false;
	}		
}
