<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarkp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_daftarkp'));
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = 'List Daftar';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['daftar_kp'] = $this->db->get_where('daftar_kp', ['created_by' =>
        $this->session->userdata('created_by')])->row_array();
        $data['userdatas'] = $this->Model_daftarkp->index_kp();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftarkp/index', $data);
        $this->load->view('templates/footer');
    }


    public function daftarkp()
    {
        $data['title'] = 'Daftar Kerja Praktek';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftarkp/daftar_kp', $data);
            $this->load->view('templates/footer');
        } else {

            $nama_perusahaan   = $this->input->post('nama_perusahaan');
            $alamat_perusahaan = $this->input->post('alamat_perusahaan');
            $upload_bukti_khs  = $_FILES['bukti_khs'];
            if ($upload_bukti_khs) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/bukti/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('bukti_khs')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .
                        $this->upload->display_errors() . '</div>');
                    redirect('daftarkp/daftarkp');
                } else {
                    $upload_bukti_khs = $this->upload->data('file_name');
                }
            }
            $upload_bukti_bayar  = $_FILES['bukti_bayar'];
            if ($upload_bukti_bayar) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/bukti/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('bukti_bayar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .
                        $this->upload->display_errors() . '</div>');
                    redirect('daftarkp/daftarkp');
                } else {
                    $upload_bukti_bayar = $this->upload->data('file_name');
                }
            }
            $upload_bukti_surat_perusahaan  = $_FILES['bukti_surat_perusahaan'];
            if ($upload_bukti_surat_perusahaan) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/bukti/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('bukti_surat_perusahaan')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .
                        $this->upload->display_errors() . '</div>');
                    redirect('daftarkp/daftarkp');
                } else {
                    $upload_bukti_surat_perusahaan = $this->upload->data('file_name');
                }
            }

            $created_by = $data['user']['nim'];
            $data = [
                'nama_perusahaan'         => $nama_perusahaan,
                'alamat_perusahaan'       => $alamat_perusahaan,
                'bukti_khs'               => $upload_bukti_khs,
                'bukti_bayar'             => $upload_bukti_bayar,
                'bukti_surat_perusahaan'  => $upload_bukti_surat_perusahaan,
                'created_by'              => $created_by,
                'date_created'            => time()
            ];
            $this->db->insert('daftar_kp', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Pendaftaran Kerja Praktek Sukses
          </div>');
            redirect('daftarkp/daftarkp');
        }
    }
}
