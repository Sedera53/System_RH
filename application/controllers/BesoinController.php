<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ilay service sy besoin re olona ah

class BesoinController extends CI_Controller {

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
        $idbesoin = $this->input->get('idbesoin');

        
        $this->load->model("BesoinModel");
        // $this->BesoinModel->insertQCM(1, 1 , $q1, $c1, $v1, $q2, $c2, $v2, $q3, $c3, $v3, $q4, $c4, $v4, $q5, $c5, $v5);
        $this->BesoinModel->insertQCM($idservice, $idbesoin, $q1, $c1, $v1, $q2, $c2, $v2, $q3, $c3, $v3, $q4, $c4, $v4, $q5, $c5, $v5);
    }
    
    public function insertCoeffDiplome(){
        $iddiplome = $this->input->get("iddiplome");
        $coefficient = $this->input->get("coefficient");
        $idservice = $this->input->get("idservice");

        $this->load->model('BesoinModel');
        $this->BesoinModel->insertCoeffDiplome($iddiplome, $coefficient, $idservice);
    }

    public function insertCoeffNationalite(){
        $idnationalite = $this->input->get("idnationalite");
        $coefficient = $this->input->get("coefficient");
        $idservice = $this->input->get("idservice");

        $this->load->model('BesoinModel');
        $this->BesoinModel->insertCoeffNationalite($idnationalite, $coefficient, $idservice);
    }
}
