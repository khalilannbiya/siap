<?php
date_default_timezone_set("Asia/Jakarta");

class ModelAuth extends CI_Model
{
  public function insertData()
  {
    $data = [
      'name' => $this->input->post('name', true),
      'email' => $this->input->post('email', true),
      'jenis_kelamin' => $this->input->post('gender', true),
      'nik' => $this->input->post('nik', true),
      'no_hp' => $this->input->post('nope', true),
      'address' => $this->input->post('alamat', true),
      'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
      'role_id' => 2,
      'is_active' => 1,
      'date_created' => time(),
    ];

    $this->db->insert('user', $data);
  }
}
