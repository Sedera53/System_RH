<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Model {
    
    public function getJournalVente(){
        $sql = "select 
        v_mvt.dateComm,
        v_mvt.idComm,
        v_mvt.compte,
        v_mvt.libelle,
        v_mvt.debit,
        v_mvt.credit
        from v_mvt
        order by v_mvt.idComm,v_mvt.dateComm,v_mvt.libelle,v_mvt.debit desc";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}