<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceController extends CI_Controller {

    public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		if(!$this->session->has_userdata('huhu')){
			redirect("Welcome/index");
		}
	}
	public function loadSelectionCv(){
		$this->load->view('accueil');
		$this->load->view('selectionCv');
		$this->load->view('footer');
	}
	public function loadAttente(){
		$this->load->model('UtilModel');
		$data['data'] = $this->UtilModel->getAllAttente();
		$this->load->view('accueil');
		$this->load->view('cvattente',$data);
		$this->load->view('footer');
	}
	public function addCv(){
		$this->load->model('UtilModel');
		$idbesoin = $this->input->post('idbesoin');
		$nom = $this->input->post('nom');
		$prenom= $this->input->post('prenom');
		$numero = $this->input->post('phone');
		$datenaissance = $this->input->post('datenaiss');
		$iddiplome = $this->input->post('iddiplome');
		$experience = $this->input->post('exp');
		$idMatrimoniale = $this->input->post('idmatr');
		$idsex = $this->input->post('idsex');
		$idnationalite = $this->input->post('idnationalite');
		$annee = $this->input->post('anneeexp');

		if (!empty($idbesoin)&&!empty($nom)&&!empty($prenom)&&!empty($numero)&&!empty($datenaissance)&&!empty($iddiplome)&&!empty($experience)&&!empty($idMatrimoniale)&&!empty($idsex)&&!empty($idnationalite)&&!empty($annee)) { 
			$this->UtilModel->insertCv($idbesoin,$nom,$prenom,$numero,$datenaissance,$iddiplome,$idMatrimoniale,$idsex,$experience,$idnationalite,$annee);
		}
		$this->loadViewAnnonce();
	}
	public function loadViewCv(){
		$queryDiplome = $this->db->get('diplome');
        $data['diplomes'] = $queryDiplome->result();
		
        $queryNationalite = $this->db->get('nationalite');
        $data['nationalites'] = $queryNationalite->result();
		
		$queryMatrimonialee = $this->db->get('sit_matr');
        $data['matrimoniales'] = $queryMatrimonialee->result();
		
		$queryGenre = $this->db->get('genre');
        $data['genres'] = $queryGenre->result();

		$idbesoin = $this->input->get('idbesoin');
		$data['idbesoin'] = $idbesoin;

			$this->load->view('accueil');
			$this->load->view('save_cvClient',$data);
			$this->load->view('footer');
		
	}
	
	public function loadViewAnnonce(){
		$this->load->model('BesoinModel');
		$data = $_SESSION['huhu'];
		$data1 = $this->BesoinModel->getBesoin();
		$array['tab'] = array($data,$data1);

		$this->load->view('accueil');
		$this->load->view('annonce',$array);
		$this->load->view('footer');
	}
	public function insertQCM(){
        // ilay valiny atao hoe 'pomme/banane/[avocat]/salami'
        $q1 = $this->input->get("q1");
        $c1 = $this->input->get("c1");
        $v1 = $this->input->get("v1");

        $q2 = $this->input->get("q2");
        $c2 = $this->input->get("c2");
        $v2 = $this->input->get("v2");
        
        $q3 = $this->input->get("q3");
        $c3 = $this->input->get("c3");
        $v3 = $this->input->get("v3");
        
        $q4 = $this->input->get("q4");
        $c4 = $this->input->get("c4");
        $v4 = $this->input->get("v4");
        
        $q5 = $this->input->get("q5");
        $c5 = $this->input->get("c5");
        $v5 = $this->input->get("v5");

        $idservice = $this->input->get('idservice');
		
        $this->load->model("BesoinModel");
        $idbesoin = $this->BesoinModel->getIdMaxBesoin();
        // $this->BesoinModel->insertQCM(1, 1 , $q1, $c1, $v1, $q2, $c2, $v2, $q3, $c3, $v3, $q4, $c4, $v4, $q5, $c5, $v5);
        $this->BesoinModel->insertQCM($idservice, $idbesoin, $q1, $c1, $v1, $q2, $c2, $v2, $q3, $c3, $v3, $q4, $c4, $v4, $q5, $c5, $v5);
    }
	public function insertBesoin(){
		$idservice = $this->input->post('idservice');
		$nombesoin = $this->input->post('nombesoin');
		$tauxjourhomme = $this->input->post('tjh');
  		$volumehoraire = $this->input->post('vh');
		$iddiplome = $this->input->post('iddiplome');
		$coeffdipl = $this->input->post('coeffdipl');
		$poste = $this->input->post('poste');
		$idmatr = $this->input->post('matr');
		$exp = $this->input->post('exp');
		$anneeexp = $this->input->post('anneeExp');
		$idnationalite = $this->input->post('idnationalite');
		$coeffnation = $this->input->post('coeffnation');
		$this->load->helper('date');
		date_default_timezone_set('Europe/Paris');
		$daty = date('Y-m-d');
		$salmax = $this->input->post('salmax');
		$salmin = $this->input->post('salmin');
		$data['idservice'] = $idservice;
		
		$this->load->model('BesoinModel');
		$this->BesoinModel->insertBesoin($idservice ,$idmatr,$daty,$nombesoin,$tauxjourhomme, $volumehoraire, $iddiplome, $poste, $exp, $anneeexp, $idnationalite, $salmin, $salmax, $coeffdipl, $coeffnation);

		$this->load->view('accueil');
		$this->load->view('save_qcm',$data);
		$this->load->view('footer');
			//$this->SaveDataService();
	}
	public function loadBesoinPage(){
		$this->load->model('ServiceModel');
		$data = $_SESSION['huhu'];
		$idservice = $this->input->get('idService');
		$nombesoin = $this->input->get('nom');
		//$data1 = $this->ServiceModel->getServiceById($idservice);
		$data['idservice'] = $idservice;
		//$array['tab'] = array($data,$data1);

		$queryDiplome = $this->db->get('diplome');
        $data['diplomes'] = $queryDiplome->result();

        $queryNationalite = $this->db->get('nationalite');
        $data['nationalites'] = $queryNationalite->result();

		$queryMatrimonialee = $this->db->get('sit_matr');
        $data['matrimoniale'] = $queryMatrimonialee->result();

		$this->load->view('accueil');
		$this->load->view('save_service',$data);
		$this->load->view('footer');
	}
	public function loadSelectService(){
		$this->load->model('ServiceModel');
		$data = $_SESSION['huhu'];
		$data1 = $this->ServiceModel->getAllService();
		$array['tab'] = array($data,$data1);

		$this->load->view('accueil');
		$this->load->view('selectService',$array);
		$this->load->view('footer');
	}
	public function SaveDataQcm($data){
		$this->load->view('accueil');
		$this->load->view('save_qcm',$data);
		$this->load->view('footer');
	}
	public function SaveDataService(){
		$this->load->view('accueil');
		$this->load->view('save_dataService');
		$this->load->view('footer');
	}
	public function addServicee() {
		$this->load->model('ServiceModel');
		$service = $this->input->post('nomService');

		if (!empty($service)) { 
			$this->ServiceModel->insertService($service);
		}
		$this->SaveDataService();
	}

}