<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_admin");
        // cekLogin();
    }


    //USER PRODUK
    public function produk()
    {
        $data['title'] = 'Produk yang dijual';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['uproduk'] = $this->m_produk->userProduk();

        $this->load->view('templates/pubhead', $data);
        $this->load->view('user/dataproduk', $data);
        $this->load->view('templates/pubfoot');
    }

    public function addproduk()
    {
        $data = [
            'title' => 'Tambah Produk',
            'ktg' => $this->m_produk->kategori(),
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()

        ];
        
        $this->load->view('templates/pubHead', $data);
        $this->load->view('user/addProduk', $data);
        $this->load->view('templates/pubFoot');
    }

    public function proses()
    {
        $nama_produk = $this->input->post('nama_produk');
        $merk        = $this->input->post('merk');
        $deskripsi   = $this->input->post('deskripsi');
        $stok        = $this->input->post('stok');
        $harga       = $this->input->post('harga');
        $kategori_id = $this->input->post('kategori_id');
        $user_id = $this->input->post('user_id');
        $produk_img  = $_FILES['produk_img']['name'];
        if ($produk_img = ''){}else{
            $config ['upload_path'] = './assets/img/produk';
            $config ['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('produk_img')){
                echo 'aplut gagal';
            }else{
                $produk_img = $this->upload->data('file_name');
            }
        }

        $data =  array(
            'nama_produk'   => $nama_produk,
            'merk'          => $merk,
            'deskripsi'     => $deskripsi,
            'stok'          => $stok,
            'harga'         => $harga,
            'kategori_id'   => $kategori_id,
            'user_id'       => $user_id,
            'produk_img'    => $produk_img,
        );

        $this->m_produk->tambahProduk($data, 'produk');
        redirect('user/produk');
    }

    public function produkEdit($id)
    {
        $where = array('produk_id' => $id);
        $data = [
            'title' => 'edit produk',
            'ktg' => $this->m_produk->kategori(),
            'produks' => $this->m_produk->editProduk($where, 'produk')->result(),
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()

        ];

        $this->load->view('templates/pubHead', $data);
        $this->load->view('user/editproduk', $data);
        $this->load->view('templates/pubFoot');
    }

    public function prosesEdit()
    {
        $id             = $this->input->post('produk_id');
        $nama_produk    = $this->input->post('nama_produk');
        $merk           = $this->input->post('merk');
        $deskripsi      = $this->input->post('deskripsi');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $kategori_id    = $this->input->post('kategori_id');
        $produk_img     = $this->input->post('produk_img');
        if ($produk_img = ''){}else{
            $config ['upload_path'] = './assets/img/produk';
            $config ['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('produk_img')){
                echo 'aplut gagal';
            }else{
                $produk_img = $this->upload->data('file_name');
            }
        }

        $data =  array(
            'nama_produk'   => $nama_produk,
            'merk'          => $merk,
            'deskripsi'     => $deskripsi,
            'stok'          => $stok,
            'harga'         => $harga,
            'kategori_id'   => $kategori_id,
            'produk_img'    => $produk_img,
        );
        $where = [
            'produk_id' => $id
        ];

        $this->m_produk->prosesUpdate($where,$data,'produk');
        redirect('user/produk');

    }

    public function tambahKeranjang()
	{
        
        $redirect_page = $this->input->post('redirect_page');
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
		);
		
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
	}

    
}