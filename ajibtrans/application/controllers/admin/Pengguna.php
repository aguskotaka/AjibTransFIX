<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if (($this->session->userdata('level') !="Admin")){
            redirect('admin/auth');
        }
    }
	public function index()
	{
        $this->db->from('user');
        $this->db->order_by('nama','ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => "AjibTrans | Pengguna",
            'user' => $user
            
        );
		$this->template->load('template','admin/form_pengguna',$data);
	}
    
    public function input_data()
    {
        $data = array('judul_halaman' => "AjibTrans | Pengguna");
        $this->template->load('template','admin/form_inputpengguna',$data);

    }
    public function simpan()
	{
        $username = $this->input->post('username');
        $cekusername = $this->db->where('username', $username)->count_all_results('user');
        if ($cekusername >=1) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Maaf, username sudah digunakan!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/pengguna/');
        }
		$data = array(
			'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level')
		);
		$this->db->insert('user',$data);
		$this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Data Berhasil disimpan!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
		redirect('admin/pengguna/');
	}
    public function hapus($user){
        $where = array('id_user' => $user);
        $this->db->Delete('user',$where);
        $this->session->set_Flashdata('alert','
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Data anda berhasil dihapus!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect('admin/pengguna/');
    }
    public function edit($user){
        $this->db->select('*')->from('user');
        $this->db->where('id_user',$user);
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
        $this->template->load('layout/template','form_edit',array_merge($data));
    }
    public function update(){
        $data = array(
            'nama'  => $this->input->post('nama'),
            'level'  => $this->input->post('level'),
        );
        $where = array('id_user' => $this->input->post('id_user'));
        $this->db->update('user', $data, $where);
        $this->session->set_Flashdata('alert','
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Data anda berhasil diperbarui!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect('admin/pengguna/');
    }
}