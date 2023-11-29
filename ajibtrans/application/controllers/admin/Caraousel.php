<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caraousel extends CI_Controller
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
        $this->db->select('*')->from('caraousel');
        $cara = $this->db->get()->result_array();
        $data = array(
            'cara' => $cara,
            'judul_halaman' => "AjibTrans | Caraousel"
        );
        $this->template->load('template', 'admin/form_caraousel', array_merge($data));
    }
    public function input_konten()
    {
        $this->db->select('*')->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => "Pengguna | Werbsite Rippky",
            'kategori' => $kategori,
        );
        $this->template->load('template', 'admin/form_inputkonten',  array_merge($data) );

    }
    public function simpan()
    {
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'assets/upload/caraousel/';
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
            redirect('admin/Caraousel/');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('eror' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto,
        );
        $this->db->insert('caraousel', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Caraousel Berhasil disimpan!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/Caraousel/');
    }

    public function hapus($id)
    {
        $filename=FCPATH.'/assets/upload/caraousel/'.$id;
        if(file_exists($filename)){
            unlink("./assets/upload/caraousel/".$id);
        }
        $where = array('foto' => $id);
        $this->db->Delete('caraousel', $where);
        $this->session->set_Flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Caraousel anda berhasil dihapus!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
        redirect('admin/caraousel/');
    }
    public function edit($konten)
    {
        $this->db->select('*')->from('konten');
        $this->db->where('id_konten', $konten);
        $konten = $this->db->get()->result_array();
        $data = array('konten' => $konten);
        $this->template->load('layout/template', 'form_edit', array_merge($data));
    }
   
}