<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
    $data['title'] = "Tambah Kategori";
    $email = $this->session->userdata('email');
    $data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
    $data['categories'] = $this->ModelCategories->getDataALl();

    $this->form_validation->set_rules(
      'categories',
      'Kategori',
      'required|trim|max_length[15]|is_unique[categories.categories]',
      [
        'required' => '%s harus diisi!.',
        'max_length' => 'Kategori terlalu panjang, Max 15 karakter!',
        'is_unique' => 'Kategori ini sudah ada!'
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
      redirect('category');
    }
  }

  public function deleteCategories($id)
  {
    $this->db->delete('categories', ['id_categories' => $id]);
    $this->session->set_flashdata('message', 'Kategori telah dihapus!');
    redirect('category');
  }
}
