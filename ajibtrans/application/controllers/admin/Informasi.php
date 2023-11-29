<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
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
        $this->db->select('*')->from('informasi');
        $informasi = $this->db->get()->result_array();
        $data = array(
            'informasi' => $informasi,
            'judul_halaman' => "AjibTrans | Informasi"
        );
        $this->template->load('template', 'admin/form_informasi', array_merge($data));
    }
    public function input_informasi()
    {
        $this->db->select('*')->from('informasi');
        $this->db->order_by('id_informasi', 'ASC');
        $informasi = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => "AjibTrans | Informasi",
            'informasi' => $informasi,
        );
        $this->template->load('template', 'admin/form_inputinformasi',  array_merge($data) );

    }
    public function simpan()
    {
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'assets/upload/informasi/';
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
            redirect('admin/Informasi/');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('eror' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal'),
            'foto' => $namafoto,
        );
        $this->db->insert('informasi', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Foto Berhasil disimpan!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/Informasi/');
    }

    public function hapus($id)
    {
        $filename=FCPATH.'/assets/upload/informasi/'.$id;
        if(file_exists($filename)){
            unlink("./assets/upload/informasi/".$id);
        }
        $where = array('foto' => $id);
        $this->db->Delete('informasi', $where);
        $this->session->set_Flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Foto anda berhasil dihapus!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
        redirect('admin/Informasi/');
    }
    public function edit($informasi)
    {
        $this->db->select('*')->from('informasi');
        $this->db->where('id_informasi', $informasi);
        $informasi = $this->db->get()->result_array();
        $data = array('informasi' => $informasi);
        $this->template->load('layout/template', 'form_edit', array_merge($data));
    }
   
}