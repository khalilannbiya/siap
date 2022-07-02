<?php
date_default_timezone_set("Asia/Jakarta");

class ModelComplaint extends CI_Model
{
  public function insertData()
  {
    $kode_unik = mt_rand(000000, 999999);

    $data = [
      'user_id' => $this->input->post('userid', true),
      'judul' =>  $this->input->post('judul', true),
      'body' => $this->input->post('body', true),
      'status' => 'diterima',
      'categories_id' => $this->input->post('categories', true),
      'kode_unik' => $kode_unik,
      'date_created' => time()
    ];

    $this->db->insert('reporting', $data);
  }

  public function getDataByEmailSession()
  {
    $userEmail = $this->session->userdata('email');
    $this->db->select('reporting.id_aduan, user.name, , user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->where('user.email', $userEmail);
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->result_array();

    return $query;
  }

  public function searchComplaintForUser()
  {
    $keyword = $this->input->post('keyword', true);
    $userEmail = $this->session->userdata('email');

    $this->db->select('reporting.id_aduan, user.name, user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->like('reporting.judul', $keyword);
    $this->db->where('user.email', $userEmail);
    $this->db->or_like('categories.categories', $keyword);
    $this->db->where('user.email', $userEmail);
    $this->db->or_like('reporting.kode_unik', $keyword);
    $this->db->where('user.email', $userEmail);
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->result_array();

    return $query;
  }

  public function searchByStatus($status)
  {
    $userEmail = $this->session->userdata('email');
    $this->db->select('reporting.id_aduan, user.name, user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->where('user.email', $userEmail);
    $this->db->where('reporting.status', $status);
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->result_array();

    return $query;
  }

  public function searchByButtonStatus($status)
  {
    $this->db->select('reporting.id_aduan, user.name, user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->where('reporting.status', $status);
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->result_array();

    return $query;
  }

  public function getDataById($unic)
  {
    $userEmail = $this->session->userdata('email');
    $this->db->select('reporting.id_aduan, user.name, , user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->where('user.email', $userEmail);
    $this->db->where('reporting.kode_unik', $unic);
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->row_array();

    return $query;
  }

  public function getDataNumByStatus()
  {
    $approved = $this->db->get_where('reporting', ['status' => "diterima"])->num_rows();
    $onprocess = $this->db->get_where('reporting', ['status' => "diproses"])->num_rows();
    $done = $this->db->get_where('reporting', ['status' => "selesai"])->num_rows();
    $all = $this->db->get('reporting')->num_rows();
    return [$approved, $onprocess, $done, $all];
  }

  public function getDataByUnicCode()
  {
    $data = [
      'first' => $this->input->post('first', true),
      'second' => $this->input->post('second', true),
      'third' => $this->input->post('third', true),
      'fourth' => $this->input->post('fourth', true),
      'fifth' => $this->input->post('fifth', true),
      'sixth' => $this->input->post('sixth', true),
    ];
    $keyword = implode("", $data);

    return $this->db->select('name, categories, judul, body, status, kode_unik, date_created')
      ->where(['kode_unik' => $keyword])
      ->get('aduan')->row_array();
    // return $this->db->get_where('aduan', ['kode' => $keyword])->row_array();
  }

  public function getAllDataAduanLimit()
  {
    $this->db->select('reporting.id_aduan, user.name, , user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->order_by('id_aduan', 'DESC');
    $this->db->limit(5);
    $query = $this->db->get()->result_array();

    return $query;
  }

  public function getAllDataAduan()
  {
    $this->db->select('reporting.id_aduan, user.name, , user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->result_array();

    return $query;
  }

  public function getDataAduanByStatusDiterima()
  {
    return $this->db->where('status', 'diterima')
      ->order_by('id', 'DESC')
      ->get('aduan')->result_array();
  }

  public function searchAduanByKeyword()
  {
    $keyword = $this->input->post('keyword', true);

    $this->db->select('reporting.id_aduan, user.name, user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->like('user.name', $keyword);
    $this->db->or_like('reporting.judul', $keyword);
    $this->db->or_like('user.nik', $keyword);
    $this->db->or_like('user.no_hp', $keyword);
    $this->db->or_like('user.email', $keyword);
    $this->db->or_like('categories.categories', $keyword);
    $this->db->or_like('reporting.kode_unik', $keyword);
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->result_array();

    return $query;
  }

  public function getDataAduanByCode($unic)
  {
    $this->db->select('reporting.id_aduan, user.name, , user.email, user.no_hp, user.address, user.nik, categories.categories, reporting.judul, reporting.body, reporting.kode_unik, reporting.status, reporting.date_created');
    $this->db->from('reporting');
    $this->db->join('user', 'reporting.user_id = user.id_user');
    $this->db->join('categories', 'reporting.categories_id = categories.id_categories');
    $this->db->where('reporting.kode_unik', $unic);
    $this->db->order_by('id_aduan', 'DESC');
    $query = $this->db->get()->row_array();

    return $query;
  }

  public function hapusDataAduan($unic)
  {
    return $this->db->delete('aduan', ['kode_unik' => $unic]);
  }

  public function ubahDataAduan()
  {
    $data = [
      'categories' => $this->input->post('categories', true),
      'judul' => $this->input->post('judul', true),
      'body' => $this->input->post('body', true),
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('aduan', $data);
  }

  public function ubahToProcess($unic)
  {
    $data =  ['status' => 'diproses'];

    $this->db->where('kode_unik', $unic);
    $this->db->update('aduan', $data);
  }

  public function ubahToSelesai($unic)
  {
    $data =  ['status' => 'selesai'];

    $this->db->where('kode_unik', $unic);
    $this->db->update('aduan', $data);
  }
}
