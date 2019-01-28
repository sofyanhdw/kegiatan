<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function  __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$data = array('title'	=>	'Halaman Login');
		$this->load->view('admin/login', $data);
	}
	public function aksi_login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$passwordx = md5($password);
		$where=array(
					 'nama_users'=>$username,
					 'pass_users'=>$passwordx
					 );
		$cek=$this->m_login->cek_login($username,$passwordx);
		if($cek->num_rows() >  0){
			$data=$cek->row_array();
			$this->session->set_userdata('masuk',TRUE);
			if($data['Akses_users'] =='admin'){
			   $this->session->set_userdata('ses_nama',$data['nama_users']);
			   $this->session->set_flashdata('sukses', 'Selamat Anda Berhasil Login');
			   redirect('admin/kegiatan');
			}
			else{
				$this->session->set_userdata('akses','users');
				$this->session->set_userdata('ses_nama',$data['nama_users']);
				redirect(base_url('admin/dashboard'));
			}
		}
		function logout(){
			$this->session->session_destroy();
			redirect(''); 
		}
	}
}
