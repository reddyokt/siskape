<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarkp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['bahan'] = $this->Model_daftarkp->tampil_data()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('Daftarkp/detail_daftarkp', $data);
        $this->load->view('template/footer');
    }

    public function tambah_aksi()
    {
        $nama_bahan            = $this->input->post('nama_bahan');
        $rumus_kimia_bahan     = $this->input->post('rumus_kimia_bahan');
        $qty                   = $this->input->post('qty');
        $satuan                = $this->input->post('satuan');
        $tempat_simpan         = $this->input->post('tempat_simpan');
        $foto                  = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']      = './assets/foto';
            $config['allowed_types']    = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal, Periksa Kembali File Anda";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_bahan'            => $nama_bahan,
            'rumus_kimia_bahan'     => $rumus_kimia_bahan,
            'qty'                   => $qty,
            'satuan'                => $satuan,
            'tempat_simpan'         => $tempat_simpan,
            'foto'                  => $foto
        );

        $this->Model_daftarkp->input_data($data, 'bahan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 style="text-align:center;">Data Berhasil Ditambahkan</h3>
      </div>');
        redirect('bahan/index');
    }

    public function hapus_data($id_bahan)
    {
        $where = array('id_bahan' => $id_bahan);
        $this->Model_daftarkp->hapus_data($where, 'bahan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 style="text-align:center;">Data Berhasil Dihapus!</h3>
      </div>');
        redirect('bahan/index');
    }

    public function edit($id_bahan)
    {
        $where = array('id_bahan' => $id_bahan);
        $data['bahan'] =  $this->Model_daftarkp->edit_data($where, 'bahan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('bahan/edit_data_bahan', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id_bahan              = $this->input->post('id_bahan');
        $nama_bahan            = $this->input->post('nama_bahan');
        $rumus_kimia_bahan     = $this->input->post('rumus_kimia_bahan');
        $qty                   = $this->input->post('qty');
        $satuan                = $this->input->post('satuan');
        $tempat_simpan         = $this->input->post('tempat_simpan');
        $foto                  = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']      = './assets/foto';
            $config['allowed_types']    = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal, Periksa Kembali File Anda";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'id_bahan'              => $id_bahan,
            'nama_bahan'            => $nama_bahan,
            'rumus_kimia_bahan'     => $rumus_kimia_bahan,
            'qty'                   => $qty,
            'satuan'                => $satuan,
            'tempat_simpan'         => $tempat_simpan,
            'foto'                  => $foto
        );

        $where = array(
            'id_bahan' => $id_bahan
        );

        $this->Model_daftarkp->update_data($where, $data, 'bahan');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 style="text-align:center;">Data Berhasil Dirubah </h3>
      </div>');
        redirect('bahan/index');
    }
    public function detail($id_bahan)
    {
        $this->load->model('Model_daftarkp');
        $detail = $this->Model_daftarkp->detail_data($id_bahan);
        $data['detail'] = $detail;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('bahan/detail_bahan', $data);
        $this->load->view('template/footer');
    }

    public function print()
    {
        $data['bahan'] = $this->Model_daftarkp->tampil_data("bahan")->result();
        $this->load->library('pdf');
        $this->load->view('bahan/print_bahan', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['bahan'] = $this->Model_daftarkp->tampil_data('bahan')->result();

        $this->load->view('bahan/laporan_pdf', $data);
        $paper_size  = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_bahan.pdf", array('attachment' => 0));
    }

    public function excel()
    {
        $this->load->library('dompdf_gen');
        $data['bahan'] = $this->Model_daftarkp->tampil_data('bahan')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
    }
}
