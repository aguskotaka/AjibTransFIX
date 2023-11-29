<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{

    public function index(){
        $this->load->view('admin/login');
    }
    public function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username', $username)->where('password', $password);
        $data = $this->db->get()->row();
        if($data==NULL){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Username dan Password salah!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('admin/auth');

        } else {
            $userdata = array(
                'is_login'  => true,
                'id_user'  => $data->id_user,
                'password'  => $data->password,
                'username'  => $data->username,
                'level'  => $data->level,

            );
            $this->session->set_userdata($userdata);
            redirect('admin/pengguna');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/auth');
    }
}