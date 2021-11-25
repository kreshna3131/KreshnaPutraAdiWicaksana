<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataMahasiswa extends CI_Controller
{
    // membuat class construct
    public function __construct()
    {
        // untuk menjalankan program pertama kali dieksekusi
        parent::__construct();
        // load model dan library
        $this->load->model("mahasiswa_model");
        $this->load->library('form_validation');
    }

    // mengambil data model dan di render
    public function index()
    {
        // untuk mengambil data dari model secara keseluruhan
        $data["DataMahasiswa"] = $this->mahasiswa_model->getAll();
        // meload data pada view yang sudah dibuat pada folder view
        $this->load->view("admin/mahasiswa/list", $data);
    }

    // menambahkan data dan tidak lupa divalidasi
    public function add()
    {
        // menayatakan objek model
        $mahasiswa = $this->mahasiswa_model;
        // menayatakan form validasi untuk mempermudah
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        // percabangan nilai untuk melakukan validasi
        if ($validation->run()) {
            $mahasiswa->save();
            $this->session->set_flashdata('berhasil', 'Berhasil disimpan');
        }

        // untuk meload tampilan newform pada bagian view
        $this->load->view("admin/mahasiswa/new_form");
    }

    // untuk fungsi edit dengan nilai defaultnya null
    public function edit($id = null)
    {
        // redirect jika tidak ada id
        if (!isset($id)) redirect('admin/DataMahasiswa');
       
        // menayatakan objek model
        $mahasiswa = $this->mahasiswa_model;
        // menayatakan form validasi untuk mempermudah
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        // percabangan nilai untuk melakukan validasi
        if ($validation->run()) {
            $mahasiswa->update();
            $this->session->set_flashdata('berhasill', 'Berhasil disimpan');
        }

        // mengambil data untuk ditampilkan pada form
        $data["mahasiswa"] = $mahasiswa->getById($id);
        // jika tidak ada data
        if (!$data["mahasiswa"]) show_404();
        
        $this->load->view("admin/mahasiswa/edit_form", $data);
    }

    // untuk fungsi delete dengan nilai defaultnya null
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mahasiswa_model->delete($id)) {
            redirect(site_url('admin/DataMahasiswa'));
        }
    }

}
