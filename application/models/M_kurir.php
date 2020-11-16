<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_kurir extends CI_Model
{
    public function getKurir()
    {
        return $this->db->from('kurir')
          ->get()
          ->result();
    }
}