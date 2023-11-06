<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		// $data['tb_users'] = $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array();
		// $data['tb_karyawan'] = $this->db->get('tb_karyawan')->result_array();
		// $data['tb_users'] = $this->db->get('tb_users')->result_array();

		// $data['title'] = 'Karyawan';

		$data = [
			'title' => 'Data Karyawan',
			'tb_users' => $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_karyawan' => $data['tb_karyawan'] = $this->db->get('tb_karyawan')->result_array(),
			'tb_users' => $this->db->get('tb_users')->result_array(),
			'active' => 'karyawan'
		];
		$this->load->view('templates/auth_header', $data);
		$this->load->view('user/karyawan/index', $data);
		$this->load->view('templates/auth_footer');
	}

	public function add()
	{
		// $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim|regex_match[/^[A-Z]{3}\d{3}$/]|is_unique[tb_barang.kode_barang]', [
		// 	'required' => 'Form ini harus diisi.',
		// 	'regex_match' => 'Kode barang harus terdiri dari 3 huruf besar dan 3 angka.',
		// 	'is_unique' => 'Kode barang sudah ada.',
		// ]);
		// $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim|max_length[50]', [
		// 	'required' => 'Form ini harus di isi.',
		// 	'max_length' => 'Maksimal 50 karakter.'
		// ]);
		// $this->form_validation->set_rules('lokasi_barang', 'Lokasi Barang', 'required|trim', [
		// 	'required' => 'Form ini harus di isi.'
		// ]);
		// $this->form_validation->set_rules('stock', 'Stock Barang', 'required|trim|numeric', [
		// 	'required' => 'Form ini harus di isi.',
		// 	'numeric' => 'Harus berupa angka.'
		// ]);
		// $this->form_validation->set_rules('harga', 'Harga Barang', 'required|trim|numeric', [
		// 	'required' => 'Form ini harus di isi.',
		// 	'numeric' => 'Harus berupa angka.'
		// ]);

		$data = [
			// 'nama_karyawan' => htmlspecialchars($this->input->post('nama_karyawan')),
			'jabatan' => htmlspecialchars($this->input->post('jabatan')),
			'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')),
			'no_hp' => htmlspecialchars($this->input->post('no_hp')),
			'alamat' => htmlspecialchars($this->input->post('alamat')),
			'user_id' => htmlspecialchars($this->input->post('user_id')),
		];

		$this->db->insert('tb_karyawan', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Tambah data karyawan Berhasil!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
		redirect('karyawan');
	}

	public function delete($id)
	{
		$this->db->where('id_karyawan', $id);
		$this->db->delete('tb_karyawan');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

		redirect('karyawan');
	}
}
