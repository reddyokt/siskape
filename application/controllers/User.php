<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {

        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        //$this->load->model(array('Model_user'));
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        //$data['userdata'] =  $this->Model_user->joinuser();
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $name   = $this->input->post('name');
            $email  = $this->input->post('email');

            //ini cek upload gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {

                $config['upload_path']   = './assets/img/profile/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = '2048000';

                $this->load->library('upload', $config);
                //$this->load->helper(array('form', 'url'));
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {

                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .
                        $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Profile telah diupdate
          </div>');
            redirect('user');
        }
    }

    public function ubahPassword()
    {
        //$this->load->model(array('Model_user'));
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|matches[password_baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('templates/footer');
        } else {

            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');

            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            PASSWORD LAMA Yang anda Masukkan Salah!
          </div>');
                redirect('user/ubahPassword');
            } else {

                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    PASSWORD BARU tidak boleh sama dengan PASSWORD LAMA!
                  </div>');
                    redirect('user/ubahPassword');
                } else {
                    //kalau sudah ok passwordnya
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                    PASSWORD berhasil dirubah
                  </div>');
                    redirect('user');
                }
            }
        }
    }
}
