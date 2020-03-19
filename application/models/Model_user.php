<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function joinuser()
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'user.fakultas_id = fakultas.fakultas_id');
        $this->db->join('prodi', 'prodi.fakultas_id = fakultas.fakultas_id');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }
}
