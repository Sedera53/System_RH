<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_control extends CI_Controller {
    public function __construct()
    { 
        parent::__construct();
        $this->load->database();
    }
    public function loadGrandLivre(){
        
        $this->load->view('accueil');
        $this->load->view('GrandLivre');
    }
    public function loadJournal(){
        $this->load->model('Journal');
        $data['data'] = $this->Journal->getJournalVente();
        $this->load->view('accueil');
        $this->load->view('Journal',$data);
    }
    public function showFacture(){
        $id1 = $this->input->post('idCompteTier');
        $id2 = $this->input->post('idComm');
        $daty = $this->input->post('daty');
        $this->load->model('Commande');          
        $data = $this->Commande->getFacture($id1,$id2,$daty);
        $data2 = $this->Commande->getFactureOne($id1,$id2,$daty);
        $array['tab'] = array($data2,$data);
        $this->load->view('facture',$array);
    }
    public function loadFormFacture(){
        $id = $this->input->get('idCompteTier');
        $this->load->model('Client');
        $this->load->model('Commande');
        $data = $this->Client->getClientById($id);
        $data2 = $this->Commande->getClientFacture($id);
        $array['tab'] = array($data,$data2);
        $this->load->view('accueil');
        $this->load->view('voirFacture',$array);
    }
    public function ajoutValeurFacture(){
        $com_client = $this->input->post("ref_client");
        date_default_timezone_set('Europe/Paris');
        $com_date = date('Y-m-d');
        $com_ttc = $this->input->post("total_com");
        $com_ht = ($com_ttc/120)*100;
        $com_tva = $com_ttc-$com_ht;

        $texte_com = $this->input->post("chaine_com");
        $tab_com = explode('|', $texte_com);

        $this->db->trans_start(); 

        $commande_data = array(
            'idCompteTier' => $com_client,
            'dateComm' => $com_date,
            'prixttc' => $com_ttc,
            'prixht' => $com_ht,
            'prixtva' => $com_tva
        );
        $this->db->insert('commande', $commande_data);
        $detail_com = $this->db->insert_id();

        foreach ($tab_com as $ligne_com) {
            if (!empty($ligne_com)) {
                $ligne_com = explode(';', $ligne_com);
                $detail_data = array(
                    'idComm' => $detail_com,
                    'idArticle' => $ligne_com[0],
                    'quantiteComm' => $ligne_com[1]
                );
                $this->db->insert('detailCommande', $detail_data);
                $this->db->set('quantite', 'quantite-' . $ligne_com[1], false);
                $this->db->where('idArticle', $ligne_com[0]);
                $this->db->update('article');
            }
        }
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            redirect('C_control/loadClient');
        } else {
            echo "Insertion non validé";
        }
    }
    public function addFacture(){
        $this->load->model('Client');
        $idCompteTier2 = $this->input->post('ref_client');
        $data = $this->Client->getAllClient();
        $this->load->model('Article');
        $article = $this->Article->getAllArticle();
        $array['tab'] = array($data,$article);
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