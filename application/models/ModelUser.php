<?php

class ModelUser extends CI_Model
{
  public function getUserByEmail()
  {
    return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }
}
