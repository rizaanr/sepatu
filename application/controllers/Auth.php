<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
		$this->load->view('log reg');
		}else{
			$this->_login();
		}
    }
    
    private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika user ada
		if ($user) {
			// jika user aktif
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data=[
						'email' => $user['email'],
						'role'=> $user['role']
					];
					$this->session->set_userdata($data);
					if ($user['role'] == 1) {
						redirect('admin');
					} else {
						redirect('dashboard');
					}
				;}else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email has not ben activated</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
    }

    public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repead Password', 'required|trim|matches[password1]');
		

		if ($this->form_validation->run() == false) {
			$this->load->view('log reg');
		} else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role' => $this->input->post('role'),
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user',$data);
			redirect('auth');
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">registrasi berhasil</div>');
			redirect('auth');
		}

	}
    
    public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lock Out</div>');
		redirect('auth');
	}
}
