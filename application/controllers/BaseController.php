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

	public function showFormSaveDataService(){
		$this->load->view('accueil');
		$this->load->view('save_dataService');
		$this->load->view('footer');
	}

    /*public function loadAnnonce()
    {
        $this->load->view('accueil');
		$this->load->view('annonce');
		$this->load->view('footer');
    }

    public function showFormSaveQcm(){
        $this->load->view('accueil');
		$this->load->view('save_qcm');
		$this->load->view('footer');
    }*/
}