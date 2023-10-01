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
    
    public function insertBesoin($idservice ,$tauxJourHomme, $volumeHoraire, $iddiplome, $posteRecherche, $experience, $anneeExperience, $idnationalite, $salaireMin, $salaireMax, $coeffdiplome, $coeffnationalite){
        // tokony miala ato ilay experiance de atao tableau mitokana
        $data = array(
            'idservice' => $idservice,
            'taux_jour_homme' => $tauxJourHomme,
            'poste_recherche' => $posteRecherche,
            'experience' => $experience,
            'annee_experience' => $anneeExperience,
            'salaire_min' => $salaireMin,
            'salaire_max' => $salaireMax,
            'idnationalite' => $idnationalite,
            'iddiplome' => $iddiplome,
            'volume_horaire' => $volumeHoraire
        );
        $this->db->insert('besoin', $data);
        $this->insertCoeffDiplome($iddiplome, $coeffdiplome, $idservice);
        $this->insertCoeffNationalite($idnationalite, $coeffnationalite, $idservice);
        return $this->db->insert_id();
    }

    public function insertCoeffDiplome($iddiplome, $coefficient, $idservice){
        // tokony apina $idbesoin
        $data = array(
            'iddiplome'=> $iddiplome,
            'coefficient'=> $coefficient,
            'idservice'=> $idservice
        );
        $this->db->insert('coefficient_diplome', $data);
        return $this->db->insert_id();
    }

    public function insertCoeffNationalite($idnationalite, $coefficient, $idservice){
        // tokony apina $idbesoin 
        $data = array(
            'idnationalite'=> $idnationalite,
            'coefficient'=> $coefficient,
            'idservice'=> $idservice
        );
        $this->db->insert('coefficient_nationalite', $data);
        return $this->db->insert_id();
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