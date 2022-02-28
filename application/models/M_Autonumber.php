<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Autonumber extends CI_Model {

    public function id_terakhir()
    {
        $this->db->select('no_document');
        $this->db->from('_t_t_pengajuan');
        $this->db->order_by('no_document', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
}