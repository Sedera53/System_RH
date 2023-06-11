<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getArticleById($id){
        $sql = "select * from article where idArticle = '$id'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getAllArticle(){
        $sql = "select * from article";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}