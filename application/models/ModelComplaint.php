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

  public function getDataByEmailSession()
  {
    $userEmail = $this->session->userdata('email');
    return $this->db->where('email', $userEmail)
      ->order_by('id', 'DESC')
      ->get('aduan')->result_array();
  }

  public function searchComplaintForUser()
  {
    $dataUser =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


    $keyword = $this->input->post('keyword', true);
    return $this->db->like(['categories' => $keyword, 'email' => $dataUser['email']])
      ->or_like('status', $keyword)
      ->or_like('kode_unik', $keyword)
      ->order_by('id', 'DESC')
      ->get('aduan')->result_array();
  }

  public function searchByStatus($status)
  {
    $dataUser =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    return $this->db->where(['status' => $status, 'email' => $dataUser['email']])->order_by('id', 'DESC')
      ->get('aduan')->result_array();
  }

  public function getDataById($unic)
  {
    // Menampilkan data dari table user yang email nya sesuai session email, dan ambil datu baris saja
    $dataUser =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // Menampilkan data dari table aduan yang kode_unik nya sama dengan dikirimkan oleh user melalui method get di url, dan emailnya sama dengan user yang memiliki email sesuai session
    return $this->db->get_where('aduan', ['kode_unik' => $unic, 'email' => $dataUser['email']])->row_array();
  }

  public function getDataNumByStatus()
  {
    $approved = $this->db->get_where('aduan', ['status' => "diterima"])->num_rows();
    $onprocess = $this->db->get_where('aduan', ['status' => "diproses"])->num_rows();
    $done = $this->db->get_where('aduan', ['status' => "selesai"])->num_rows();
    return [$approved, $onprocess, $done];
  }
}
