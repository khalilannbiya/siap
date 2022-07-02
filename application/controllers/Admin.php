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

  public function managementCategories()
  {
    $data['title'] = "Tambah Kategori";
    $email = $this->session->userdata('email');
    $data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
    $data['categories'] = $this->ModelCategories->getDataALl();

    $this->form_validation->set_rules(
      'categories',
      'Kategori',
      'required|trim|max_length[15]',
      [
        'required' => '%s harus diisi!.',
        'max_length' => 'Kategori terlalu panjang!',
      ]
    );
    if (!$this->form_validation->run()) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/setting-kategori', $data);
      $this->load->view('templates/footer');
    } else {
      $this->ModelCategories->insertData();
      $this->session->set_flashdata('message', 'Kategori telah ditambahkan!');
      redirect('admin/managementCategories');
    }
  }

  public function deleteCategories($id)
  {
    $this->db->delete('categories', ['id_categories' => $id]);
    $this->session->set_flashdata('message', 'Kategori telah dihapus!');
    redirect('admin/managementCategories');
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

  public function user()
  {
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
    $this->ModelUser->deleteUser($id);
    $this->session->set_flashdata('message', 'Data user telah dihapus!');
    redirect('admin/user');
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
