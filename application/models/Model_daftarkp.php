<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_daftarkp extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_kp()
    {
        $this->db->select('user.*, daftar_kp.created_by AS nim, 
        daftar_kp.nama_perusahaan, 
        daftar_kp.alamat_perusahaan,
        daftar_kp.bukti_khs,
        daftar_kp.bukti_bayar,
        daftar_kp.bukti_surat_perusahaan');
        $this->db->join('daftar_kp', 'user.nim = daftar_kp.created_by');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }


    public function daftar()
    {
        $this->db->select('user.*, daftar_kp.created_by AS nim, 
                                daftar_kp.nama_perusahaan, 
                                daftar_kp.alamat_perusahaan,
                                daftar_kp.bukti_khs,
                                daftar_kp.bukti_bayar,
                                daftar_kp.bukti_surat_perusahaan');
        $this->db->join('daftar_kp', 'user.nim = daftar_kp.created_by');
        $this->db->from('user');
        $query = $this->db->get();
        //$user = $query->row();
        return $query->result();
    }
}
