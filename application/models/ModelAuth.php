<?php

class ModelAuth extends CI_Model
{
  public function insertData()
  {
    $data = [
      'name' => $this->input->post('name', true),
      'email' => $this->input->post('email', true),
      'image' => "default.jpg",
      'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
      'role_id' => 2,
      'is_active' => 1,
      'date_created' => time(),
    ];

    $this->db->insert('user', $data);
  }
}
