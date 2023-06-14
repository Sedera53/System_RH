<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function addZero($zavatra, $length) {
        return str_pad($zavatra, strlen($zavatra), '0', STR_PAD_LEFT);
    }
    
}
