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

    // Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan admin, jadi tidak boleh masuk ke controller admin
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

  public function process($unic)
  {
    $this->ModelComplaint->ubahToProcess($unic);
    $this->session->set_flashdata('message', 'Status aduan berhasil diubah menjadi Diproses!');
    redirect('complaint/index/diproses');
  }

  public function selesai($unic)
  {
    $this->ModelComplaint->ubahToSelesai($unic);
    $this->session->set_flashdata('message', 'Status aduan berhasil diubah menjadi Selesai!');
    redirect('complaint/index/selesai');
  }

  public function print($unic)
  {
    $data['complaint'] = $this->ModelComplaint->getDataAduanByCode($unic);

    // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    $this->load->library('pdfgenerator');

    // title dari pdf
    $data['title'] = "Cetak bukti aduan";

    // filename dari pdf ketika didownload
    $file_pdf = "Bukti Aduan " . $data['complaint']['name'];
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "portrait";

    // $html = $this->load->view('user/cetak_pdf', $this->data, true);
    $html = $this->load->view('admin/print_pdf', $data, true);

    // run dompdf
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }
}
