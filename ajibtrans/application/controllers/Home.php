<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
    }
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
		$this->load->view('dashboard',$data);
	}

	public function kategori($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('informasi');
		$informasi = $this->db->get()->result_array();

		$this->db->from('galeri');
		$galeri = $this->db->get()->result_array();

		$this->db->from('barang a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->where('a.id_kategori',$id);
        $barang = $this->db->get()->result_array();

		$this->db->from('kategori');
		$this->db->where('id_kategori',$id);
		$nama_kategori = $this->db->get()->row()->nama_kategori;

		$data = array(
			'judul' => "AjibTrans | ".$nama_kategori,
			'caraousel' => $caraousel,
			'nama_kategori' => $nama_kategori,
			'konfig' => $konfig,
			'kategori' => $kategori,
			'informasi' => $informasi,
			'galeri' => $galeri,
			'barang' => $barang
		);
		$this->load->view('kategori',$data);
	}

	public function artikel($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('barang a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
		$this->db->where('slug',$id);
        $barang = $this->db->get()->row();

		$data = array(
			'judul'	=> "Ajibtrans | ". $barang->judul,
			'konfig' => $konfig,
			'kategori' => $kategori,
			'barang' => $barang
		);
		$this->load->view('keterangan',$data);
	}

	public function contact()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$data = array(
			'judul_halaman' => "AjibTrans | Contact Us",
			'konfig' => $konfig,
			'kategori' => $kategori,
	
		);
		$this->load->view('contact',$data);
	}
	public function produk()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('barang a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
        $barang = $this->db->get()->result_array();

		$data = array(
			'judul'	=> "AjibTrans | Mobil",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'caraousel' => $caraousel,
			'barang' => $barang,
		);
		$this->load->view('kategori', $data);
	}

	public function about()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
		
		$this->db->from('caraousel');
		$caraousel = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('informasi');
		$informasi = $this->db->get()->result_array();

		$data = array(
			'judul' => "AjibTrans | About Us",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'caraousel' => $caraousel,
			'informasi' => $informasi,
	
		);
		$this->load->view('about',$data);
	}

	public function informasi()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('informasi');
		$informasi = $this->db->get()->result_array();

		$data = array(
			'judul' => "AjibTrans | Informasi",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'informasi' => $informasi,
	
		);
		$this->load->view('informasi',$data);
	}

	public function galeri()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('galeri');
		$galeri = $this->db->get()->result_array();

		$data = array(
			'judul' => "AjibTrans | Galeri",
			'konfig' => $konfig,
			'kategori' => $kategori,
			'galeri' => $galeri,
	
		);
		$this->load->view('galeri',$data);
	}

	
}