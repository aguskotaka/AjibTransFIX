<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
        $this->db->select('*')->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('barang a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
        $barang = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => "AjibTrans | Barang",
            'barang' => $barang,
            'kategori' => $kategori
        );
        $this->template->load('template', 'admin/form_barang', array_merge($data));
    }
    public function input_konten()
    {
        $this->db->select('*')->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => "AjibTrans | Barang",
            'kategori' => $kategori,
        );
        $this->template->load('template', 'admin/form_inputbarang',  array_merge($data) );

    }
    public function simpan()
    {
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'assets/upload/barang/';
        $config['max_size']         = 5 * 1024 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited
        $config['file_name']        = $namafoto;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 5 * 500 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto dengan ukuran yang kurang dari 5mb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/Barang/');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('eror' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }

        $this->db->from('barang');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Barang sudah digunakan!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/Barang/');
        }

        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'harga' => $this->input->post('harga'),
            'tanggal' => date('Y-m-d'),
            'foto' => $namafoto,
            'slug' =>str_replace(' ','-',$this->input->post('judul')),
            'username' => $this->session->userdata('username'),
            'status' => $this->input->post('status'),
        );
        $this->db->insert('barang', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Barang Berhasil disimpan!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/Barang/');
    }

    public function update()
    {
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']      = 'assets/upload/konten/';
        $config['max_size']         = 5 * 1024 * 1024; //3 * 1024 * 1024; //3mb; 0=unlimited
        $config['file_name']        = $namafoto;
        $config['overwrite']        = true;
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 5 * 1024 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-check me-2"></i>Maaf, Upload foto dengan ukuran yang kurang dari 5mb!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('admin/Barang/');
        }elseif(!$this->upload->do_upload('foto')){
            $error = array('eror' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
      
        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'harga' => $this->input->post('harga'),
            'status' => $this->input->post('status'),
            'slug' =>str_replace(' ','-',$this->input->post('judul')),
        );
        $where = array(
            'foto'      => $this->input->post('nama_foto')
        );
        $this->db->update('barang', $data,$where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Barang Berhasil disimpan!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/Barang/');
    }
    public function hapus($id)
    {
        $filename=FCPATH.'/assets/upload/barang/'.$id;
        if(file_exists($filename)){
            unlink("./assets/upload/barang/".$id);
        }
        $where = array('foto' => $id);
        $this->db->Delete('barang', $where);
        $this->session->set_Flashdata('alert', '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>Barang anda berhasil dihapus!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
        redirect('admin/Barang/');
    }
    public function edit($barang)
    {
        $this->db->select('*')->from('barang');
        $this->db->where('id_barang', $barang);
        $barang = $this->db->get()->result_array();
        $data = array('barang' => $barang);
        $this->template->load('layout/template', 'form_edit', array_merge($data));
    }
   
}