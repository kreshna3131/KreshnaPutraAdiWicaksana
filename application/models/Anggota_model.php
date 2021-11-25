<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    // nama tabel
    private $_table = "tb_anggota";

    // nama kolom ditabel, harus sesuai hurufnya
    public $id_kegiatan;
    public $nama_kegiatan;
    public $keterangan;
    public $tanggal;
    public $kas_masuk;
    public $kas_keluar;
    public $total;

    public function rules()
    {
        // mengembalikan nilai array berisi rules untuk validasi
        return [            
            ['field' => 'nama_kegiatan',
            'label' => 'Nama_kegiatan',
            'rules' => 'required'],
            
            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required'],
            
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],
            
            ['field' => 'kas_masuk',
            'label' => 'Kas_masuk',
            'rules' => ''],
            
            ['field' => 'kas_keluar',
            'label' => 'Kas_keluar',
            'rules' => ''],
            
            ['field' => 'total',
            'label' => 'Total',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        // _table adalah nama tabel
		// untuk mengembalikan array yang berisi objek dari row
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        // mengembalikan sebuah objek
		// mengambil semua dari tb_data-rt yang dimana id_nama = id
        return $this->db->get_where($this->_table, ["id_kegiatan" => $id])->row();
    }

    public function save()
    {
        // mengambil data dari form
        $post = $this->input->post();
        $this->id_kegiatan = uniqid();
        $this->nama_kegiatan = $post["nama_kegiatan"];
        $this->keterangan = $post["keterangan"];
        $this->tanggal = $post["tanggal"];
        $this->kas_masuk = $post["kas_masuk"];
        $this->kas_keluar = $post["kas_keluar"];
        $this->total = $post["total"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        // mengambil data dari form
        $post = $this->input->post();
        $this->id_kegiatan = $post["id"];
        $this->nama_kegiatan = $post["nama_kegiatan"];
        $this->keterangan = $post["keterangan"];
        $this->tanggal = $post["tanggal"];
        $this->kas_masuk = $post["kas_masuk"];
        $this->kas_keluar = $post["kas_keluar"];
        $this->total = $post["total"];
        $this->db->update($this->_table, $this, array('id_kegiatan' => $post['id']));
    }

    public function delete($id)
    {
        // menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
        return $this->db->delete($this->_table, array("id_kegiatan" => $id));
    }
}
