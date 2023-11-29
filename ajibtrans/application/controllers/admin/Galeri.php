<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('level') == NULL)) {
            redirect('admin/auth');
        }
    }
    public function index()
    {
        $this->db->select('*')->from('galeri');
        $galeri = $this->db->get()->result_array();
        $data = array(
            'galeri' => $galeri,
            'judul_halaman' => "AjibTrans | Galeri"
        );
        $this->template->load('template', 'admin/form_galeri', array_merge($data));
    }
    public function input_galeri()
    {
        $this->db->select('*')->from('galeri');
        $this->db->order_by('id_galeri', 'ASC');
        $galeri = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => "AjibTrans | Galeri",
            'galeri' => $galeri,
        );
        $this->template->load('template', 'admin/form_inputgaleri',  array_merge($data) );

    }
    public function simpan()
    {
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'assets/upload/galeri/';
        $config['max_size']         = 5 * 1024 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited
        $config['file_name']        = $namafoto;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 5 * 1024 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto dengan ukuran yang kurang dari 5mb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/Galeri/');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('eror' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'foto' => $namafoto,
        );
        $this->db->insert('galeri', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Foto Berhasil disimpan!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/Galeri/');
    }

    public function hapus($id)
    {
        $filename=FCPATH.'/assets/upload/galeri/'.$id;
        if(file_exists($filename)){
            unlink("./assets/upload/galeri/".$id);
        }
        $where = array('foto' => $id);
        $this->db->Delete('galeri', $where);
        $this->session->set_Flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Foto anda berhasil dihapus!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
        redirect('admin/Galeri/');
    }
    public function edit($galeri)
    {
        $this->db->select('*')->from('galeri');
        $this->db->where('id_galeri', $galeri);
        $galeri = $this->db->get()->result_array();
        $data = array('galeri' => $galeri);
        $this->template->load('layout/template', 'form_edit', array_merge($data));
    }
   
}