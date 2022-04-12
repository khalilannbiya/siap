<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Cek apakah ada session, jika tidak ada session maka tendang ke home atau welcome page
    if (!$this->session->userdata('email')) {
      redirect('home');
    }
  }

  public function add()
  {
    // Function tambah data aduan bagian user
    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
    if ($this->session->userdata('role_id') != 2) {
      redirect('admin');
    }
    $data['session_cek'] = $this->session->userdata('role_id') == 2;
    $data['title'] = "Buat Aduan";
    $this->load->view('templates-user/header_home', $data);
    $this->load->view('user/complaint', $data);
    $this->load->view('templates-user/footer');
  }
}
