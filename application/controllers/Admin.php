<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('home');
    }

    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
    if ($this->session->userdata('role_id') != 1) {
      redirect('user');
    }
  }


  public function index()
  {
    $data['title'] = "Dashboard";
    $email = $this->session->userdata('email');
    $data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
    $data['complaintsnum'] = $this->ModelComplaint->getDataNumByStatus();
    $data['complaints'] = $this->ModelComplaint->getAllDataAduanLimit();
    $data['users'] = $this->ModelUser->getAllDataUser();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function detailAduan($unic)
  {
    $data['title'] = "Detail Aduan";
    $email = $this->session->userdata('email');
    $data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
    $data['detail'] = $this->ModelComplaint->getDataAduanByCode($unic);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/detail-aduan', $data);
    $this->load->view('templates/footer');
  }

  public function hapusAduan($unic)
  {
    $data['complaint'] = $this->ModelComplaint->hapusDataAduan($unic);
    $this->session->set_flashdata('message', 'Data aduan telah dihapus!');
    redirect('complaint');
  }
}
