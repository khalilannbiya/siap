<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function index()
  {
    $data['title'] = "Home";
    $this->load->view('templates-user/header_home', $data);
    $this->load->view('user/index');
    $this->load->view('templates-user/footer');
  }
}
