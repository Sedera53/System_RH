<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BesoinModel extends CI_Model {


    public function insertQCM($idservice, $idbesoin, $q1, $c1, $v1, $q2, $c2, $v2, $q3, $c3, $v3, $q4, $c4, $v4, $q5, $c5, $v5){
        // ty fonction ty mbola mila mcreer base qcm
        $this->insertValinys($this->insertQuestion($idservice, $idbesoin, $q1, $c1), $v1);
        $this->insertValinys($this->insertQuestion($idservice, $idbesoin, $q2, $c2), $v2);
        $this->insertValinys($this->insertQuestion($idservice, $idbesoin, $q3, $c3), $v3);
        $this->insertValinys($this->insertQuestion($idservice, $idbesoin, $q4, $c4), $v4);
        $this->insertValinys($this->insertQuestion($idservice, $idbesoin, $q5, $c5), $v5);
    }
    
    public function insertValinys($idquestion, $valiny){
        $array = explode('/', $valiny);
        foreach ($array as $element) {
            $trimmedElement = trim($element);
            if (preg_match('/^\[(.*?)\]$/', $trimmedElement, $matches)) {
                $this->insertValiny($idquestion, $matches[1], 1);
            } else {
                $this->insertValiny($idquestion, $trimmedElement, 0);
            }
        }
    }
    public function insertValiny($idquestion, $valiny, $istrue){
        $data = array(
            'idquestion' => $idquestion,
            'valiny' => $valiny,
            'istrue' => $istrue
        );
        $this->db->insert('valiny', $data);
        return $this->db->insert_id();
    }
    public function insertQuestion($idservice, $idbesoin, $question, $coefficient){
        $data = array(
            'idservice' => $idservice,
            'idbesoin' => $idbesoin,
            'question' => $question,
            'coefficient' => $coefficient
        );
        $this->db->insert('questions', $data);
        return $this->db->insert_id();
    }
    public function getIdMaxBesoin(){
        $this->load->database();
        $this->db->select_max('idbesoin');
        $query = $this->db->get('besoin');
        return $query->row()->idbesoin;
    }
    public function insertBesoin($idservice ,$idMatrimoniale,$daty,$nombesoin,$tauxJourHomme, $volumeHoraire, $iddiplome, $posteRecherche, $experience, $anneeExperience, $idnationalite, $salaireMin, $salaireMax, $coeffdiplome, $coeffnationalite){
        // tokony miala ato ilay experiance de atao tableau mitokana
        $data = array(
            'idservice' => $idservice,
            'idMatrimoniale' => $idMatrimoniale, 
            'nombesoin' => $nombesoin,
            'taux_jour_homme' => $tauxJourHomme,
            'poste_recherche' => $posteRecherche,
            'experience' => $experience,
            'annee_experience' => $anneeExperience,
            'daty' => $daty,
            'salaire_min' => $salaireMin,
            'salaire_max' => $salaireMax,
            'idnationalite' => $idnationalite,
            'iddiplome' => $iddiplome,
            'volume_horaire' => $volumeHoraire
        );
        $this->db->insert('besoin', $data);
        $idbesoin = $this->getIdMaxBesoin();
        //var_dump($idbesoin);
        $this->insertCoeffDiplome($iddiplome, $coeffdiplome, $idbesoin);
        $this->insertCoeffNationalite($idnationalite, $coeffnationalite, $idbesoin);
        return $this->db->insert_id();
    }

    public function insertCoeffDiplome($iddiplome, $coefficient, $idbesoin){
        // tokony apina $idbesoin
        $data = array(
            'iddiplome'=> $iddiplome,
            'coefficient'=> $coefficient,
            'idbesoin'=> $idbesoin
        );
        $this->db->insert('coefficient_diplome', $data);
        return $this->db->insert_id();
    }

    public function insertCoeffNationalite($idnationalite, $coefficient, $idbesoin){
        // tokony apina $idbesoin 
        $data = array(
            'idnationalite'=> $idnationalite,
            'coefficient'=> $coefficient,
            'idbesoin'=> $idbesoin
        );
        $this->db->insert('coefficient_nationalite', $data);
        return $this->db->insert_id();
    }
    public function getBesoin(){
        $this->load->database();
    
        $query=$this->db->query("select b.idbesoin,b.idservice,s.services,b.idnationalite,n.nationalite,b.iddiplome,d.diplome,b.idMatrimoniale,sm.situation,b.nombesoin,
        b.taux_jour_homme,b.volume_horaire,b.poste_recherche,b.experience,
        b.annee_experience,b.daty,b.salaire_min,b.salaire_max
        from besoin b
        join diplome d on d.iddiplome = b.iddiplome
        join nationalite n on n.idnationalite = b.idnationalite
        join sit_matr sm on sm.idMatrimoniale = b.idMatrimoniale 
        join services s on s.idservice = b.idservice");
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
    // bedebe ny experiance ilaina am asa ray
    // hevitra: hasaraka am le besoin ilay experience satria afaka

    // public function insertExperiences($idbesoin, $experiance, $anneeExperiance){
    //     $data = array(
    //         'idbesoin'=> $idbesoin,
    //         'experiance'=> $experiance,
    //         'anneeExperiance'=> $anneeExperiance
    //     );
    //     $this->db->insert('experiance', $data);
    //     return $this->db->insert_id();
    // }
}