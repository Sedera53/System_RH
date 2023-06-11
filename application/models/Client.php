<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getClientById($id){
        $sql = "SELECT  idCompteTier, pre, intitule as societe, CONCAT(prefixe,':',intitule) AS intitule,nomResponsable,email,adresse,phone FROM CompteTier c
                JOIN planTier p 
                ON c.idPlanTier = p.idPlanTier where idCompteTier ='$id'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function insertClient($client){
        $this->db->insert('compteTier',$client);
        return $this->db->insert_id();
    }
    public function getAllClient(){
        $sql = "SELECT  idCompteTier, pre, intitule as societe, CONCAT(prefixe,':',intitule) AS intitule,nomResponsable,email,adresse,phone FROM CompteTier c
                JOIN planTier p 
                ON c.idPlanTier = p.idPlanTier";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}