<?php
date_default_timezone_set("Asia/Jakarta");

class ModelComplaint extends CI_Model
{
  public function insertData()
  {
    $kode_unik = mt_rand(000000, 999999);
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data = [
      'name' => $user['name'],
      'email' => $user['email'],
      'no_hp' => $user['no_hp'],
      'address' => $user['address'],
      'nik' => $user['nik'],
      'categories' => $this->input->post('categories', true),
      'judul' =>  $this->input->post('judul', true),
      'body' => $this->input->post('body', true),
      'kode_unik' => $kode_unik,
      'status' => 'diterima',
      'date_created' => time()

    ];

    $this->db->insert('aduan', $data);
  }
}
