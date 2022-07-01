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
      ->order_by('id_user', 'DESC')
      ->get('user', 5)->result_array();
  }

  public function getAllUser()
  {
    return $this->db->where(['role_id' => 2])
      ->order_by('id_user', 'DESC')
      ->get('user')->result_array();
  }

  public function searchByKeyword()
  {
    $keyword = $this->input->post('pencarian', true);

    return $this->db->like('name', $keyword)
      ->or_like('nik', $keyword)
      ->or_like('no_hp', $keyword)
      ->or_like('email', $keyword)
      ->order_by('id_user', 'DESC')
      ->get('user')
      ->result_array();
  }

  public function getDataAduanById($id)
  {
    return $this->db->get_where('user', ['id_user' => $id])->row_array();
  }

  public function deleteUser($id)
  {
    return $this->db->delete('user', ['id_user' => $id]);
  }
}
