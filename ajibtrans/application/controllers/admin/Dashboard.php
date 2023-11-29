<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if (($this->session->userdata('level') !="Admin")){
            redirect('admin/auth');
        }
    }

	public function index()
	{
        $data = array(
            'judul_halaman' => 'AjibTrans | Dashboard'
        );
		$this->template->load('template','admin/dashboard',$data);
	}
}
