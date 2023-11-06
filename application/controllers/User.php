<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$data = [
			'title' => 'Data Barang',
			'active' => 'barang',
			'tb_users' => $this->db->get_where('tb_users', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_barang' => $this->db->get('tb_barang')->result_array(),
			'tb_users' => $this->db->get('tb_users')->result_array(),
			'tb_karyawan' => $this->db->get('tb_karyawan')->result_array(),
		];

		$this->load->view('templates/auth_header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/auth_footer');
	}


	public function add()
	{
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim|regex_match[/^[A-Z]{3}\d{3}$/]|is_unique[tb_barang.kode_barang]', [
			'required' => 'Form ini harus diisi.',
			'regex_match' => 'Kode barang harus terdiri dari 3 huruf besar dan 3 angka.',
			'is_unique' => 'Kode barang sudah ada.',
		]);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim|max_length[50]', [
			'required' => 'Form ini harus di isi.',
			'max_length' => 'Maksimal 50 karakter.'
		]);
		$this->form_validation->set_rules('lokasi_barang', 'Lokasi Barang', 'required|trim', [
			'required' => 'Form ini harus di isi.'
		]);
		$this->form_validation->set_rules('stock', 'Stock Barang', 'required|trim|numeric', [
			'required' => 'Form ini harus di isi.',
			'numeric' => 'Harus berupa angka.'
		]);
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required|trim|numeric', [
			'required' => 'Form ini harus di isi.',
			'numeric' => 'Harus berupa angka.'
		]);

		if($this->form_validation->run() == false) {
			$data['title'] = 'Form Tambah Data Barang';
			$data['active'] = 'barang';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('user/new');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang')),
				'kode_barang' => htmlspecialchars($this->input->post('kode_barang')),
				'lokasi_barang' => htmlspecialchars($this->input->post('lokasi_barang')),
				'stock' => htmlspecialchars($this->input->post('stock')),
				'harga' => htmlspecialchars($this->input->post('harga')),
			];

			$this->db->insert('tb_barang', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Tambah data Berhasil!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
			redirect('user');
		} 
	}


	public function edit($id)
	{
    	// Mengambil data barang yang akan diubah dari database
		$data['barang'] = $this->db->get_where('tb_barang', ['id_barang' => $id])->row_array();

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim|regex_match[/^[A-Z]{3}\d{3}$/]', [
			'required' => 'Form ini harus diisi.',
			'regex_match' => 'Kode barang harus terdiri dari 3 huruf besar dan 3 angka.'
		]);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim|max_length[50]', [
			'required' => 'Form ini harus di isi.',
			'max_length' => 'Maksimal 50 karakter.'
		]);
		$this->form_validation->set_rules('lokasi_barang', 'Lokasi Barang', 'required|trim', [
			'required' => 'Form ini harus di isi.'
		]);
		$this->form_validation->set_rules('stock', 'Stock Barang', 'required|trim|numeric', [
			'required' => 'Form ini harus di isi.',
			'numeric' => 'Harus berupa angka.'
		]);
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required|trim|numeric', [
			'required' => 'Form ini harus di isi.',
			'numeric' => 'Harus berupa angka.'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit Data Barang';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('user/edit', $data); 
			$this->load->view('templates/auth_footer');
		} else {
        	// Proses perubahan data barang
			$update_data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang')),
				'kode_barang' => htmlspecialchars($this->input->post('kode_barang')),
				'lokasi_barang' => htmlspecialchars($this->input->post('lokasi_barang')),
				'stock' => htmlspecialchars($this->input->post('stock')),
				'harga' => htmlspecialchars($this->input->post('harga')),
			];

			$this->db->where('id_barang', $id);
			$this->db->update('tb_barang', $update_data);

        	// Set pesan sukses
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diubah!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

			redirect('user');
		}
	}


	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('tb_barang');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

		redirect('user');
	}
}
