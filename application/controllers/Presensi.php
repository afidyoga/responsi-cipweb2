<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('presensi_model'); // Memuat model presensi_model
        $this->load->database();
    }

    public function index() {
        $this->load->view('input_presensi'); // Menampilkan halaman formulir input
    }

    public function input() {
        // Ambil data NIM dari form
        $nim = $this->input->post('nim');

        // Proses presensi
        $data = array(
            'nim' => $nim,
            'status' => 'Hadir', // Default status hadir
            'waktu' => date('Y-m-d H:i:s') // Waktu presensi
        );

        // Simpan data ke database menggunakan model
        $this->presensi_model->insert_presensi($data);

        // Redirect ke halaman list_presensi setelah input
        redirect('presensi/list_presensi');
    }

    public function list_presensi() {
        // Ambil data presensi dari database menggunakan model
        $data['presensi'] = $this->presensi_model->get_all_presensi();

        // Menampilkan halaman daftar presensi dengan data yang diambil
        $this->load->view('list_presensi', $data);
    }
}
