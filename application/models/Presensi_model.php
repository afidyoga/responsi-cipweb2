<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi_model extends CI_Model {

    public function insert_presensi($data) {
        // Simpan data ke tabel 'presensi'
        $this->db->insert('presensi', $data);
    }

    public function get_all_presensi() {
        // Ambil semua data presensi dari tabel 'presensi'
        $query = $this->db->get('presensi');
        return $query->result();
    }
}
