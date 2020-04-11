<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get()->row();
        $this->db->select('*');
        $this->db->join('user', 'user.fakultas_id = fakultas.fakultas_id');
        $this->db->join('user', 'user.prodi_id = prodi.prodi_id');
        $this->db->from('user');

        return $query;
    }
}
