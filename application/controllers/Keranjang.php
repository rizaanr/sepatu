<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keranjang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_kurir");
    }

    public function index()
    {
        $data = [
            'title' => 'Keranjang',
            'ktg' => $this->M_produk->kategori(),
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()

        ];
        
        $this->load->view('user/datakeranjang', $data);
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('keranjang');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'  => $items['rowid'],
                'qty'    => $this->input->post($i.'[qty]'),
        );
        
        $this->cart->update($data);
        $i++;
        }
        redirect('keranjang');
    }

    public function checkout()
    {
        $data = [
            'title' => 'Checkout',
            'ktg' => $this->M_produk->kategori(),
            'kurir' => $this->m_kurir->getKurir(),
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()

        ];

        $this->load->view('user/checkout', $data);
    }

    public function prosespesanan()
    {
        $data = [
            'title' => 'Checkout',
            'ktg' => $this->m_produk->kategori(),
            'kurir' => $this->m_kurir->getKurir(),
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $proses = $this->m_invoice->index();
        if ($proses) {
            $this->cart->destroy();
            $this->load->view('templates/pubHead', $data);
            $this->load->view('user/prosespesanan', $data);
            $this->load->view('templates/pubFoot');
        }else {
            echo 'pesanan gagal diproses';
        }
        

        
    }

    
}