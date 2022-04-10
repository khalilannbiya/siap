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

    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
    if ($this->session->userdata('role_id') != 2) {
      redirect('admin');
    }
  }

  public function index()
  {
    $data['session_cek'] = $this->session->userdata('role_id') == 2;
    $data['title'] = "Beranda";
    $this->load->view('templates-user/header_home', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates-user/footer');
  }

  // public function index()
  // {
  //   $data['title'] = "My Profile";
  //   $email = $this->session->userdata('email');
  //   $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

  //   $this->load->view('templates/header', $data);
  //   $this->load->view('templates/sidebar', $data);
  //   $this->load->view('templates/topbar', $data);
  //   $this->load->view('user/index', $data);
  //   $this->load->view('templates/footer');
  // }
}
