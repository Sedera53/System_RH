<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceModel extends CI_Model {

    public function getServiceById($id){
        $this->load->database();
    
        $query=$this->db->query("select * from services where idservice='$id'");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
    public function getAllService(){
        $this->load->database();
    
        $query=$this->db->query("select * from services");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
	public function insertService($nom){
        $sql = "insert into services (services) values ('$nom')";
        $this->db->query($sql); 
    }
}
