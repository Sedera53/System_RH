<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilModel extends CI_Model {
    public function getAllAttente(){
        $this->load->database();
    
        $query=$this->db->query("select ca.idattente,ca.idcv,c.nom,b.idservice,s.services,b.experience,b.nombesoin
        from cvattente ca
            join cv c on c.idcv = ca.idcv
            join besoin b on b.idbesoin = c.idbesoin
            join services s on s.idservice = b.idservice group by ca.idcv");
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
    public function getIdMaxCv(){
        $this->load->database();
        $this->db->select_max('idcv');
        $query = $this->db->get('cv');
        return $query->row()->idcv;
    }
    public function insertCvAttente($idcv){
        $sql = "insert into cvattente (idcv) values ('$idcv')";
        $this->db->query($sql); 
    }
    public function insertCv($idbesoin,$nom,$prenom,$numero,$datenaissance,$iddiplome,$idMatrimoniale,$idsex,$experience,$idnationalite,$annee){
        // tokony apina $idbesoin
        $data = array(
            'idbesoin'=> $idbesoin,
            'nom'=> $nom,
            'prenom'=> $prenom,
            'numero'=> $numero,
            'datenaissance'=> $datenaissance,
            'iddiplome'=>$iddiplome,
            'idmatrimoniale'=>$idMatrimoniale,
            'idsex'=>$idsex,
            'experience'=>$experience,
            'idnationalite' =>$idnationalite,
            'annee_experience' =>$annee
        );
        $this->db->insert('cv', $data);
        $idcv = $this->getIdMaxCv();
        $this->insertCvAttente($idcv);
        return $this->db->insert_id();
    }
    public function getAllGenre(){
        $this->load->database();
    
        $query=$this->db->query("select * from genre");
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
}