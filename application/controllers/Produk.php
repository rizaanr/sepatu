<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
		$data =[
			'produk' => $this->M_produk->allProduk(),
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->load->view('vproduk', $data);
	}

	public function detail($id)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'produk' => $this->M_produk->detailProduk($id),
        ];
		// var_dump($data);
        $this->load->view('detailProduk', $data);
    }
}

