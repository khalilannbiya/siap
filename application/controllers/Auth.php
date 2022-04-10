<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Load library untuk form validation
    $this->load->library('form_validation');
  }


  public function index()
  {
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|trim|valid_email',
      ['required' => 'You must provide a %s.']
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required|trim',
      ['required' => 'You must provide a %s.']
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
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('messageWrong', 'Wrong password!');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('messageWrong', 'Your email has not been activated!');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('messageWrong', 'Your email is nor registered!');
      redirect('auth');
    }
  }

  public function registration()
  {
    $this->form_validation->set_rules(
      'name',
      'Name',
      'required|trim',
      ['required' => 'You must provide a %s.']
    );
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|trim|valid_email|is_unique[user.email]',
      [
        'required' => 'You must provide a %s.',
        'is_unique' => 'This email has already registered!'
      ]
    );
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[5]|matches[password2]',
      [
        'required' => 'You must provide a %s.',
        'matches' => 'password dont match!',
        'min_length' => 'Passwor too short!'
      ]
    );
    $this->form_validation->set_rules(
      'password2',
      'Password',
      'required|trim|matches[password1]',
      ['required' => 'You must provide a %s.']
    );

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = "User Registration";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $this->ModelAuth->insertData();
      $this->session->set_flashdata('message', 'Your account has been created. Please Login!');
      redirect('auth');
    }
  }

  public function logout()
  {
    // Bersihkan session dan mengembalikan ke halaman login
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', 'You have been logout!');
    redirect('auth');
  }
}
