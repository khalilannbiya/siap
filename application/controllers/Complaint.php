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

    $this->form_validation->set_rules(
      'categories',
      'Kategori',
      'required|trim',
      [
        'required' => '%s harus diisi!.',
      ]
    );
    $this->form_validation->set_rules(
      'judul',
      'Judul',
      'required|trim|max_length[50]',
      [
        'required' => '%s harus diisi!.',
        'max_length' => 'Jangan terlalu panjang!',
      ]
    );
    $this->form_validation->set_rules(
      'body',
      'Isi',
      'required|trim',
      [
        'required' => '%s harus diisi!.'
      ]
    );

    if (!$this->form_validation->run()) {
      $data['session_cek'] = $this->session->userdata('role_id') == 2;
      $data['title'] = "Buat Aduan";
      $data['user']  = $this->ModelUser->getUserByEmail();
      $data['categories'] = ['Bencana', 'Pencurian', 'Fasilitas'];
      $this->load->view('templates-user/header_home', $data);
      $this->load->view('user/complaint', $data);
      $this->load->view('templates-user/footer');
    } else {
      $this->ModelComplaint->insertData();
      $this->session->set_flashdata('message', 'Aduan anda telah dikirim-kan, silahkan tunggu untuk proses lebih lanjut!');
      redirect('complaint/add');
    }
  }

  public function get()
  {
    $data['title'] = "Riwayat";
    $data['session_cek'] = $this->session->userdata('role_id') == 2;
    $this->load->view('templates-user/header_home', $data);
    $this->load->view('user/history', $data);
    $this->load->view('templates-user/footer');
  }
}
