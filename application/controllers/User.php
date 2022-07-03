<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Cek apakah ada session, jika tidak ada session maka tendang ke auth atau login page
    if (!$this->session->userdata('email')) {
      redirect('home');
    }
  }

  public function index()
  {

    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
    if ($this->session->userdata('role_id') != 2) {
      redirect('admin');
    }
    $data['session_cek'] = $this->session->userdata('role_id') == 2;
    $data['title'] = "Beranda";
    $data['statistik'] = $this->ModelComplaint->getDataNumByStatus();
    $this->load->view('templates-user/header_home', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates-user/footer', $data);
  }

  public function myprofile()
  {

    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
    if ($this->session->userdata('role_id') != 2) {
      redirect('admin');
    }

    $data['title'] = "My Profile";
    $data['session_cek'] = $this->session->userdata('role_id') == 2;
    $data['user'] = $this->ModelUser->getUserByEmail();
    $this->load->view('templates-user/header_home', $data);
    $this->load->view('user/profile', $data);
    $this->load->view('templates-user/footer', $data);
  }

  public function getUser()
  {
    // Get data user/Masyarakat pengadu

    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan admin, jadi tidak boleh masuk ke controller admin
    if ($this->session->userdata('role_id') != 1) {
      redirect('user');
    }

    $email = $this->session->userdata('email');
    $data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
    $data['title'] = "Data User";
    if ($this->input->post('pencarian')) {
      $data['users'] = $this->ModelUser->searchByKeyword();
    } else {
      $data['users'] = $this->ModelUser->getAllUser();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data-user', $data);
    $this->load->view('templates/footer');
  }

  public function detailUser($id)
  {
    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan admin, jadi tidak boleh masuk ke controller admin
    if ($this->session->userdata('role_id') != 1) {
      redirect('user');
    }

    $data['title'] = "Detail User";
    $email = $this->session->userdata('email');
    $data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
    $data['user'] = $this->ModelUser->getDataAduanById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/detail-user', $data);
    $this->load->view('templates/footer');
  }

  public function deleteUser($id)
  {

    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan admin, jadi tidak boleh masuk ke controller admin
    if ($this->session->userdata('role_id') != 1) {
      redirect('user');
    }

    $this->ModelUser->deleteUser($id);
    $this->session->set_flashdata('message', 'Data user telah dihapus!');
    redirect('user/getUser');
  }
}
