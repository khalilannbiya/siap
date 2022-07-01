<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {

    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|trim|valid_email',
      [
        'required' => '%s harus diisi!',
        'valid_email' => 'Gunakan email yang benar!'
      ]
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required|trim',
      ['required' => '%s harus diisi!']
    );

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = "User Login";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // Validasi sukses
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    // Jika usernya ada
    if ($user) {
      // Jika usernya aktif
      if ($user['is_active'] == 1) {
        // cek password benar atau tidak
        if (password_verify($password, $user['password'])) {

          // Set session
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
          ];

          $this->session->set_userdata($data);

          // Jika Admin
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            $this->session->set_flashdata('message', "Anda telah berhasil Login!");
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('messageWrong', 'Password salah!');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('messageWrong', 'Email anda belum di aktivasi!');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('messageWrong', 'Email anda belum teregistrasi!');
      redirect('auth');
    }
  }

  public function registration()
  {
    $this->form_validation->set_rules(
      'name',
      'Name',
      'required|trim|max_length[22]',
      [
        'required' => '%s harus diisi!',
        'max_length' => 'Nama Terlalu Panjang!',
      ]
    );
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|trim|valid_email|is_unique[user.email]',
      [
        'required' => '%s harus diisi!.',
        'valid_email' => 'Gunakan email yang benar!',
        'is_unique' => 'Email ini sudah teregistrasi sebelumnya!'
      ]
    );
    $this->form_validation->set_rules(
      'nik',
      'NIK',
      'required|trim|numeric|is_unique[user.nik]|max_length[16]',
      [
        'required' => '%s harus diisi!.',
        'numeric' => 'Diisi dengan angka!',
        'max_length' => 'Yang kamu masukkan bukan NIK!',
        'is_unique' => 'Nomor ini sudah teregistrasi sebelumnya!'
      ]
    );
    $this->form_validation->set_rules(
      'gender',
      'Jenis Kelamin',
      'required|trim',
      [
        'required' => '%s harus diisi!.',
      ]
    );
    $this->form_validation->set_rules(
      'nope',
      'Nomor Telepon',
      'required|trim|numeric|max_length[13]',
      [
        'required' => '%s harus diisi!.',
        'max_length' => 'Nomor HP terlalu panjang!',
        'numeric' => 'Diisi dengan angka!'
      ]
    );
    $this->form_validation->set_rules(
      'alamat',
      'Alamat',
      'required|trim|max_length[50]',
      [
        'required' => '%s harus diisi!',
        'max_length' => 'Alamat terlalu panjang!'
      ]
    );
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[5]|matches[password2]',
      [
        'required' => '%s harus diisi!',
        'matches' => 'Password tidak sesuai!',
        'min_length' => 'Password terlalu pendek!'
      ]
    );
    $this->form_validation->set_rules(
      'password2',
      'Password',
      'required|trim|matches[password1]',
      ['required' => '%s harus diisi!']
    );

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = "User Registration";
      $data['gender'] = ['Laki-laki', 'Perempuan'];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration', $data);
      $this->load->view('templates/auth_footer');
    } else {
      $this->ModelAuth->insertData();
      $this->session->set_flashdata('message', 'Akun anda sudah di daftar-kan, silahkan login!');
      redirect('auth');
    }
  }

  public function logout()
  {
    // Bersihkan session dan mengembalikan ke halaman home
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', 'Anda telah logout!');
    redirect('home');
  }
}
