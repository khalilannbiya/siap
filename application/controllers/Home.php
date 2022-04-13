<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function index()
  {
    $data['title'] = "Home";
    $data['session_cek'] = $this->session->userdata('role_id') == 2;
    $data['statistik'] = $this->ModelComplaint->getDataNumByStatus();

    $this->load->view('templates-user/header_home', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates-user/footer');
  }
}
