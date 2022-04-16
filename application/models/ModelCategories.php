<?php
date_default_timezone_set("Asia/Jakarta");

class ModelCategories extends CI_Model
{
  public function insertData()
  {
    $data = ['categories' => $this->input->post('categories', true)];

    $this->db->insert('categories', $data);
  }

  public function getDataAll()
  {
    return $this->db->get('categories')->result_array();
  }
}
