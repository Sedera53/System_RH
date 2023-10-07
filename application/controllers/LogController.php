<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogController extends CI_Controller {

	public function disconnect(){
        $this->session->sess_destroy();
        redirect("Welcome/index");
    }
    public function loadViewAccueil($data){
        $this->load->view('accueil',$data);
		$this->load->view('content');
		$this->load->view('footer');
    }
	public function getLogin()
	{
		$email = $this->input->post("email");
        $password = $this->input->post("password");
        $this->load->model('SessionModel');
        $bool = $this->SessionModel->checkUser($email, $password);
        if($bool){
            $data= $_SESSION['huhu'];
            if($data['roles'] != 1) $this->loadViewAccueil($data);
            if($data['roles'] == 1) $this->loadViewAdmin($data);
            //$this->loadViewAccueil($data);
        }
        else if(!$bool){
            redirect('Welcome/index');
        }
	}		
}
