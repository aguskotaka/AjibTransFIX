<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    public function index()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('galeri');
		$galeri = $this->db->get()->result_array();

		$this->db->from('informasi');
		$informasi = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('barang a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
		$this->db->limit('8');
        $barang = $this->db->get()->result_array();

		$data = array(
			'judul'	=> "AjibTrans",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'caraousel' => $caraousel,
			'barang' => $barang,
			'galeri' => $galeri,
			'informasi' => $informasi
		);
		$this->load->view('kategori',$data);
	}
    public function cari() 
	{
		$paramater=$this->input->post('ketik');

		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
		
		$this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        if(isset($paramater)){
			$this->db->from('barang a');
			$this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
			$this->db->join('user c','a.username=c.username','left');
			$this->db->like('judul',$paramater);
			$this->db->or_like('nama_kategori',$paramater);
			$this->db->order_by('tanggal','DESC');
			$barang = $this->db->get()->result_array();
		} else{
			$this->db->from('barang a');
			$this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
			$this->db->join('user c','a.username=c.username','left');
			$this->db->order_by('tanggal','DESC');
			$barang = $this->db->get()->result_array();
		}
		$data = array(
            'judul' => "AjibTrans | Mobil",
            'konfig'        => $konfig,
            'kategori'      => $kategori,
            'caraousel'     => $caraousel,
            'barang'        => $barang,
        );
		$this->load->view('kategori', $data);
	}
    
    
}
