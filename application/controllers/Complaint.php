<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Cek apakah ada session, jika tidak ada session maka tendang ke home atau welcome page
		if (!$this->session->userdata('email')) {
			redirect('home');
		}
	}

	public function index($status = null)
	{
		// Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan admin, jadi tidak boleh masuk ke controller admin
		if ($this->session->userdata('role_id') != 1) {
			redirect('user');
		}

		$email = $this->session->userdata('email');
		$data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['title'] = "Semua Data Aduan";

		if ($this->input->post('keyword')) {
			$data['complaints'] = $this->ModelComplaint->searchAduanByKeyword();
		} elseif ($status) {
			$data['complaints'] = $this->ModelComplaint->searchByButtonStatus($status);
		} else {
			$data['complaints'] = $this->ModelComplaint->getAllDataAduan();
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/all', $data);
		$this->load->view('templates/footer', $data);
	}

	public function hapusAduan($unic)
	{
		// Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan admin, jadi tidak boleh masuk ke controller admin
		if ($this->session->userdata('role_id') != 1) {
			redirect('user');
		}
		$data['complaint'] = $this->ModelComplaint->hapusDataAduan($unic);
		$this->session->set_flashdata('message', 'Data aduan telah dihapus!');
		redirect('complaint');
	}

	public function update($unic)
	{
		if ($this->session->userdata('role_id') != 1) {
			redirect('user');
		}

		$data['title'] = "Ubah Data Aduan";
		$email = $this->session->userdata('email');
		$data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['complaint']  = $this->ModelComplaint->getDataAduanByCode($unic);
		$data['categories'] = $this->ModelCategories->getDataALl();

		$this->form_validation->set_rules(
			'categories',
			'Kategori',
			'required|trim',
			[
				'required' => '%s harus diisi!.',
			]
		);
		$this->form_validation->set_rules(
			'judul',
			'Judul',
			'required|trim|max_length[40]',
			[
				'required' => '%s harus diisi!.',
				'max_length' => 'Judul terlalu panjang!',

			]
		);
		$this->form_validation->set_rules(
			'body',
			'Isi',
			'required|trim',
			[
				'required' => '%s harus diisi!.'
			]
		);

		if (!$this->form_validation->run()) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->ModelComplaint->ubahDataAduan();
			$this->session->set_flashdata('message', 'Data aduan telah di ubah!');
			redirect('complaint');
		}
	}

	public function add()
	{
		// Function tambah data aduan bagian user
		// Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
		if ($this->session->userdata('role_id') != 2) {
			redirect('admin');
		}

		$data['session_cek'] = $this->session->userdata('role_id') == 2;
		$data['title'] = "Buat Aduan";
		$data['user']  = $this->ModelUser->getUserByEmail();
		$data['categories'] = $this->ModelCategories->getDataAll();

		$this->form_validation->set_rules(
			'categories',
			'Kategori',
			'required|trim',
			[
				'required' => '%s harus diisi!.',
			]
		);
		$this->form_validation->set_rules(
			'judul',
			'Judul',
			'required|trim|max_length[40]',
			[
				'required' => '%s harus diisi!.',
				'max_length' => 'Jangan terlalu panjang!',
			]
		);
		$this->form_validation->set_rules(
			'body',
			'Isi',
			'required|trim',
			[
				'required' => '%s harus diisi!.'
			]
		);

		if (!$this->form_validation->run()) {
			$this->load->view('templates-user/header_home', $data);
			$this->load->view('user/complaint', $data);
			$this->load->view('templates-user/footer');
		} else {
			$this->ModelComplaint->insertData();
			$this->session->set_flashdata('message', 'Aduan anda telah dikirim-kan, silahkan tunggu untuk proses lebih lanjut!');
			redirect('complaint/get');
		}
	}

	public function detailAduan($unic)
	{
		// Detail aduan untuk dilihat di admin

		// Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan admin, jadi tidak boleh masuk ke controller admin
		if ($this->session->userdata('role_id') != 1) {
			redirect('user');
		}

		$data['title'] = "Detail Aduan";
		$email = $this->session->userdata('email');
		$data['userlogin'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$data['detail'] = $this->ModelComplaint->getDataAduanByCode($unic);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/detail-aduan', $data);
		$this->load->view('templates/footer');
	}

	public function get($status = null)
	{
		// Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
		if ($this->session->userdata('role_id') != 2) {
			redirect('admin');
		}

		$data['title'] = "Riwayat";
		$data['session_cek'] = $this->session->userdata('role_id') == 2;

		if ($this->input->post('keyword')) {
			$data['reports'] = $this->ModelComplaint->searchComplaintForUser();
		} elseif ($status) {
			$data['reports'] = $this->ModelComplaint->searchByStatus($status);
		} else {
			$data['reports'] = $this->ModelComplaint->getDataByEmailSession();
		}
		$this->load->view('templates-user/header_home', $data);
		$this->load->view('user/history', $data);
		$this->load->view('templates-user/footer');
	}

	public function show($unic)
	{

		if (!$this->ModelComplaint->getDataById($unic)) {
			redirect('complaint/get');
		}
		$data['session_cek'] = $this->session->userdata('role_id') == 2;
		$data['title'] = "Detail";
		$data['detail'] = $this->ModelComplaint->getDataById($unic);
		$this->load->view('templates-user/header_home', $data);
		$this->load->view('user/detail', $data);
		$this->load->view('templates-user/footer');
	}

	public function print($unic)
	{

		// Jika data didalam session role_id nya tidak sama dengan 2 yang berarti dia bukan user, jadi tidak boleh masuk ke controller user
		if ($this->session->userdata('role_id') != 2) {
			redirect('admin');
		}

		$data['complaint'] = $this->ModelComplaint->getDataById($unic);

		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// title dari pdf
		$data['title'] = "Cetak bukti aduan";

		// filename dari pdf ketika didownload
		$file_pdf = "Bukti Aduan " . $data['complaint']['name'];
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		// $html = $this->load->view('user/cetak_pdf', $this->data, true);
		$html = $this->load->view('user/cetak_pdf', $data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
