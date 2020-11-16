<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

    public function user()
    {
        return $this->db->from('user')
          ->get()
          ->result();
    }
}