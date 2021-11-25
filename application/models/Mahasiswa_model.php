<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	// nama tabel
	private $tb_mahasiswa = "tb_mahasiswa";

	// nama kolom ditabel, harus sesuai hurufnya
	public $id_mahasiswa;
	public $nama_mahasiswa;
	public $email;
	public $password;
	public $kelas;
	public $jurusan;
	public $organisasi;
	public $foto;
	public $penjelasan;
	public $tanggal;

	public function rules()
	{
		// mengembalikan nilai array berisi rules untuk validasi
		return [
			[
				'field' => 'nama_mahasiswa',
				'label' => 'Nama_Mahasiswa',
				'rules' => 'required'
			],

			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			],

			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			],

			[
				'field' => 'kelas',
				'label' => 'Kelas',
				'rules' => 'required'
			],

			[
				'field' => 'jurusan',
				'label' => 'Jurusan',
				'rules' => 'required'
			],

			[
				'field' => 'organisasi',
				'label' => 'Organisasi',
				'rules' => 'required'
			],

			[
				'field' => 'foto',
				'label' => 'Foto',
				'rules' => ''
			],

			[
				'field' => 'penjelasan',
				'label' => 'Penjelasan',
				'rules' => 'required'
			],

			[
				'field' => 'tanggal',
				'label' => 'Tanggal',
				'rules' => 'required'
			]
		];
	}

	public function getAll()
	{
		// tb_mahasiswa adalah nama tabel
		// untuk mengembalikan array yang berisi objek dari row
		return $this->db->get($this->tb_mahasiswa)->result();
	}

	public function getById($id)
	{
		// mengembalikan sebuah objek
		// mengambil semua dari tb_data-rt yang dimana id_nama = id
		return $this->db->get_where($this->tb_mahasiswa, ["id_mahasiswa" => $id])->row();
	}

	public function save()
	{
		$id_mahasiswa = $this->input->post('id');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$organisasi = $this->input->post('organisasi');
        $foto = $_FILES['foto'];
        if ($foto = ''){
            $this->load->view('admin/mahasiswa/new_form');
        }
        else {
            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }
            else {
                $foto = $this->upload->data('file_name');
            }
        }
		$penjelasan = $this->input->post("penjelasan");
		$tanggal = $this->input->post("tanggal");

        $data = array(
            'id_mahasiswa' => $id_mahasiswa, 
            'nama_mahasiswa' => $nama_mahasiswa, 
            'email' => $email, 
            'password' => $password, 
            'kelas' => $kelas, 
            'jurusan' => $jurusan, 
            'organisasi' => $organisasi, 
            'foto' => $foto,
            'penjelasan' => $penjelasan, 
            'tanggal' => $tanggal,
        );
        
		$this->db->insert($this->tb_mahasiswa, $data);
		$this->session->set_flashdata('berhasil', 'Berhasil disimpan');
        redirect($this->load->view('admin/mahasiswa/new_form'));
	}

	public function update()
	{
		$id_mahasiswa = $this->input->post('id');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$organisasi = $this->input->post('organisasi');
        $foto = $_FILES['foto'];
        if ($foto = ''){
            $this->load->view('admin/mahasiswa/edit_form');
        }
        else {
            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }
            else {
                $foto = $this->upload->data('file_name');
            }
        }
		$penjelasan = $this->input->post("penjelasan");
		$tanggal = $this->input->post("tanggal");

        $data = array(
            'id_mahasiswa' => $id_mahasiswa, 
            'nama_mahasiswa' => $nama_mahasiswa, 
            'email' => $email, 
            'password' => $password, 
            'kelas' => $kelas, 
            'jurusan' => $jurusan, 
            'organisasi' => $organisasi, 
            'foto' => $foto,
            'penjelasan' => $penjelasan, 
            'tanggal' => $tanggal,
        );

		$this->db->update($this->tb_mahasiswa, $data, array('id_mahasiswa' => $post['id']));
		redirect('admin/DataMahasiswa');
	}

	public function delete($id)
	{
		// menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
		return $this->db->delete($this->tb_mahasiswa, array("id_mahasiswa" => $id));
	}
}
