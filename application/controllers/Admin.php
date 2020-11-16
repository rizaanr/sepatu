<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_admin");
    }

    public function index()
    {
        $data = [
            
            'tittle' => 'Dashboard',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'roleAdm' => $this->m_admin->getCountAdmin(),
            'roleByr' => $this->m_admin->getCountBuyer(),
            'roleSlr' => $this->m_admin->getCountSeller(),
            'jumProduk' => $this->m_admin->getJumProduk(),
        ];

        $this->load->view('templates/head', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/foot');
    }

    public function users()
    {
        $data['tittle'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['seller'] = $this->m_admin->getSeller();
        $data['buyer'] = $this->m_admin->getBuyer();

        $this->load->view('templates/head', $data);
        $this->load->view('admin/datauser', $data);
        $this->load->view('templates/foot');
    }

    public function administrator()
    {
        $data['tittle'] = 'Data Administrator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admins'] = $this->m_admin->getAdmin();

        $this->load->view('templates/head', $data);
        $this->load->view('admin/dataadmin', $data);
        $this->load->view('templates/foot');
    }

    public function add()
    {
        $data['tittle'] = 'Add Admin ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repead Password', 'required|trim|matches[password1]');
		

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/head', $data);
            $this->load->view('admin/addAdmin', $data);
            $this->load->view('templates/foot');
		} else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role' => 1,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user',$data);
			redirect('admin/administrator');
			$this->session->set_flashdata('meset', '<div class="alert alert-success" role="alert">registrasi berhasil</div>');
			redirect('admin/administrator');
		}
    }

    public function produk()
    {
        $data = [
            'tittle' => 'Data Produk',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'produks' => $this->m_admin->getProduk()
        ];

        $this->load->view('templates/head', $data);
        $this->load->view('admin/dataproduk', $data);
        $this->load->view('templates/foot');
    }
    public function invoice()
    {
        $data = [
            'tittle' => 'Data Produk',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'invoice' => $this->m_invoice->getData(),
            'produks' => $this->m_admin->getProduk()
        ];

        $this->load->view('templates/head', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/foot');
    }

    public function detailInvoice($invoice_id)
    {
        $data =[
            'tittle' => 'Detail Invoice',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'invoice' => $this->m_invoice->ambil_invoice($invoice_id),
            'pesanan' => $this->m_invoice->ambil_pesanan($invoice_id),
        ];

        $this->load->view('templates/head', $data);
        $this->load->view('admin/detailInvoice', $data);
        $this->load->view('templates/foot');
    }
}