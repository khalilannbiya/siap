<?php

class ModelUser extends CI_Model
{
  public function getUserByEmail()
  {
    return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }

  public function getAllDataUser()
  {
    return $this->db->where(['role_id' => 2])
      ->order_by('id', 'DESC')
      ->get('user', 5)->result_array();
  }
}
