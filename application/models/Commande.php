<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getClientFacture($id){
        $sql = "SELECT c.idComm,c.dateComm AS datecommande, c.idCompteTier AS idCompteTier,
        ct.nomResponsable AS nomResponsable, ct.intitule, ct.email, ct.adresse, ct.phone,c.prixttc as ttc
        FROM commande c
        JOIN compteTier ct ON c.idCompteTier = ct.idCompteTier where c.idCompteTier='$id'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getFactureOne($idtier,$idcomm,$daty){
        $sql = "SELECT a.designation AS designation, quantiteComm AS quantite, a.prixUnitaire AS prixUnitaire, c.dateComm AS datecommande, c.idCompteTier AS idCompteTier,
        d.idComm AS idcommande, ct.nomResponsable AS nomResponsable, ct.intitule, ct.email, ct.adresse, ct.phone,c.prixttc as ttc
        FROM detailCommande d
        JOIN article a ON a.idArticle = d.idArticle
        JOIN commande c ON c.idComm = d.idComm
        JOIN compteTier ct ON c.idCompteTier = ct.idCompteTier
        WHERE c.idCompteTier = '$idtier' and d.idComm = '$idcomm' and c.dateComm = '$daty' LIMIT 1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getFacture($idtier,$idcomm,$daty){
        $sql = "SELECT a.designation AS designation, quantiteComm AS quantite, a.prixUnitaire AS prixUnitaire, c.dateComm AS datecommande, c.idCompteTier AS idCompteTier,
        d.idComm AS idcommande, ct.nomResponsable AS nomResponsable, ct.intitule, ct.email, ct.adresse, ct.phone,c.prixttc as ttc
        FROM detailCommande d
        JOIN article a ON a.idArticle = d.idArticle
        JOIN commande c ON c.idComm = d.idComm
        JOIN compteTier ct ON c.idCompteTier = ct.idCompteTier
        WHERE c.idCompteTier = '$idtier' and d.idComm = '$idcomm' and c.dateComm ='$daty'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getAllCommande(){
        $sql = "select * from commande";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}