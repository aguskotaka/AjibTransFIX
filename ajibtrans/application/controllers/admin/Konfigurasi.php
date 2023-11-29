<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (($this->session->userdata('level') ==NULL)){
            redirect('admin/auth');
        }
    }
	public function index()
	{
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'AjibTrans | Konfigurasi',
            'konfig'        => $konfig
        );
		$this->template->load('template','admin/form_konfigurasi',$data);
	}
    public function update(){
        $data = array(
            'judul_website'  => $this->input->post('judul_website'),
            'profile_website'  => $this->input->post('profile_website'),
            'waktu_buka'  => $this->input->post('waktu_buka'),
            'instagram'  => $this->input->post('instagram'),
            'facebook'  => $this->input->post('facebook'),
            'email'  => $this->input->post('email'),
            'alamat'  => $this->input->post('alamat'),
            'no_wa'  => $this->input->post('no_wa'),
            'tiktok'  => $this->input->post('tiktok'),
        );
        $where = array('id_konfigurasi' => 1);
        $this->db->update('konfigurasi', $data, $where);
        $this->session->set_Flashdata('alert','
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Konfigurasi anda berhasil diperbarui!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect('admin/konfigurasi');
    }
    
}