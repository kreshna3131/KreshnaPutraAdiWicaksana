<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PencatatanRT extends CI_Controller
{
    // membuat class construct
    public function __construct()
    {
        // untuk menjalankan program pertama kali dieksekusi
        parent::__construct();
        // load model dan library
        $this->load->model("anggota_model");
        $this->load->library('form_validation');
    }

    // mengambil data model dan di render
    public function index()
    {
        // untuk mengambil data dari model secara keseluruhan
        $data["PencatatanRT"] = $this->anggota_model->getAll();
        // meload data pada view yang sudah dibuat pada folder view
        $this->load->view("admin/anggota/list", $data);
    }

    // menambahkan data dan tidak lupa divalidasi
    public function add()
    {
        // menayatakan objek model
        $anggota = $this->anggota_model;
        // menayatakan form validasi untuk mempermudah
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        // percabangan nilai untuk melakukan validasi
        if ($validation->run()) {
            $anggota->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // untuk meload tampilan newform pada bagian view
        $this->load->view("admin/anggota/new_form");
    }

    // untuk fungsi edit dengan nilai defaultnya null
    public function edit($id = null)
    {
        // redirect jika tidak ada id
        if (!isset($id)) redirect('admin/PencatatanRT');
       
        // menayatakan objek model
        $anggota = $this->anggota_model;
        // menayatakan form validasi untuk mempermudah
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        // percabangan nilai untuk melakukan validasi
        if ($validation->run()) {
            $anggota->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // mengambil data untuk ditampilkan pada form
        $data["anggota"] = $anggota->getById($id);
        // jika tidak ada data
        if (!$data["anggota"]) show_404();
        
        $this->load->view("admin/anggota/edit_form", $data);
    }

    // untuk fungsi delete dengan nilai defaultnya null
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->anggota_model->delete($id)) {
            redirect(site_url('admin/PencatatanRT'));
        }
    }

}
