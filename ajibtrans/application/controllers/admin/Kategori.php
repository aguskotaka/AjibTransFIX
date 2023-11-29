<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if (($this->session->userdata('level') ==NULL)){
            redirect('admin/auth');
        }
    }
	public function index()
	{
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori','ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => "AjibTrans | Kategori",
            'kategori' => $kategori
            
        );
		$this->template->load('template','admin/form_kategori',$data);
	}
    
    public function input_kategori()
    {
        $data = array('judul_halaman' => "AjibTrans | Kategori");
        $this->template->load('template','admin/form_inputkategori',$data);

    }
    public function simpan()
	{
        $this->db->from('kategori');
		$data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
		);
        $this->db->where('nama_kategori',$this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Maaf, kategori sudah digunakan!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/Kategori/');
        }

		$this->db->insert('kategori',$data);
		$this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Kategori Berhasil disimpan!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
		redirect('admin/kategori/');
	}
    public function hapus($kategori){
        $where = array('id_kategori' => $kategori);
        $this->db->Delete('kategori',$where);
        $this->session->set_Flashdata('alert','
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Kategori anda berhasil dihapus!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect('admin/Kategori/');
    }
    public function edit($kategori){
        $this->db->select('*')->from('kategori');
        $this->db->where('id_kategori',$kategori);
        $kategori = $this->db->get()->result_array();
        $data = array('kategori' => $kategori);
        $this->template->load('layout/template','form_edit',array_merge($data));
    }
    public function update(){
        $data = array(
            'nama_kategori'  => $this->input->post('nama_kategori'),
        );
        $where = array('id_kategori' => $this->input->post('id_kategori'));
        $this->db->update('kategori', $data, $where);
        $this->session->set_Flashdata('alert','
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Kategori anda berhasil diperbarui!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect('admin/Kategori/');
    }
}