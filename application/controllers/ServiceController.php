<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		if(!$this->session->has_userdata('huhu')){
			redirect("Welcome/index");
		}
	}

	public function addService(){
		$service=$this->input->post('nomService');
		$this->load->model('ServiceModel');
		try{
            $basecontrol = new BaseController();
            $this->ServiceModel->insertService($service);
            $basecontrol->showFormSaveDataService();
		}
		catch(Exception $e){
			alert("Non inseré");
		}
    }
}