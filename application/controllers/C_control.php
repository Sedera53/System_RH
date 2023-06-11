<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_control extends CI_Controller {

    public function addFacture(){
        $this->load->model('Client');
        $idCompteTier = $this->input->get('idCompteTier');
        $idCompteTier2 = $this->input->post('ref_client');
        $data = $this->Client->getAllClient();
        $fact = $this->Client->getClientById($idCompteTier);
        $this->load->model('Article');
        $article = $this->Article->getAllArticle();
        $array['tab'] = array($data,$fact,$article);
        $this->load->view('accueil');
        $this->load->view('ajoutFacture',$array);
    }
    public function addClient(){
        $this->load->model('Client');
        $type = $this->input->post('type');
        $societe = $this->input->post('societe');
        $dirigeant = $this->input->post('dirigeant');
        $email = $this->input->post('email');
        $adresse = $this->input->post('adresse');
        $phone = $this->input->post('phone');

        $client = new Client();
        $client->idPlanTier = $type;
        $client->intitule = $societe;
        $client->nomResponsable = $dirigeant;
        $client->email = $email;
        $client->adresse = $adresse;
        $client->phone = $phone;
        try {
            $client->insertClient($client);
            $this->loadAjoutClient();
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function loadAjoutClient(){
        $this->load->view('accueil');
        $this->load->view('ajoutClient');
    }
    public function loadClient(){
        $this->load->model('Client');
        $data['data'] = $this->Client->getAllClient();
        $this->load->view('accueil');
        $this->load->view('listClient',$data);
    }
    public function loadAccueil(){
        $this->load->view('accueil');
    }
}