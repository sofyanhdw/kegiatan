<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model');
                $this->load->library(array('session', 'form_validation','table'));
                $this->load->helper(array('form', 'url','file'));
                $this->load->database();
        }

	public function index()
	{
		$tbl_alumni = $this->User_model->listing();
		$data = array(	'title'			=>	'Halaman Registrasi Alumni',
						'tbl_alumni'	=> 	$tbl_alumni,
						'isi'			=>	'admin/user/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{
		//validasi

		$valid = $this->form_validation;
		$valid->set_rules('npm', 'NPM', 'required', array(
						'required'	=>	'npm harus diisi'));
		$valid->set_rules('nama_users', 'Nama', 'required', array(
						'required'	=>	'Nama harus diisi'));
		$valid->set_rules('jurusan', 'Jurusan', 'required', array(
						'required'	=>	'Jurusan harus diisi'));
		$valid->set_rules('angkatan', 'Angkatan', 'required', array(
						'required'	=>	'Angkatann harus diisi'));
		$valid->set_rules('password_user', 'Password User', 'required', array(
						'required'	=>	'Password User harus diisi'));
		$valid->set_rules('tahun_lulus', 'Tahun Lulus', 'required', array(
						'required'	=>	'tahun_lulus harus diisi'));
		if($valid->run()===FALSE) {
			//end validasi
			$data = array(	'title'		=>	'Halaman Registrasi Alumni',
						'isi'		=>	'admin/user/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data);
	} else {
			
             $NPM = $this->input->post('npm');
             $Jurusan = $this->input->post('jurusan');
             $Angkatan = $this->input->post('angkatan');
             $tahun_lulus=$this->input->post('tahun_lulus');
             $alumni = array(
                                'npm'=>$NPM,
                                'jurusan'=>$Jurusan,
                                'angkatan'=>$Angkatan,
                                'tahun_lulus'=>$tahun_lulus,
 
           // 'id_kegiatan'=>$id_kegiatan_insert
                );     
           
            $id_alumni=$this->User_model->create('tbl_alumni',$alumni);
            $nama_users=$this->input->post('nama_users');
            $pass_users=$this->input->post('password_user');
            $password= md5($pass_users);
            $hak_akses=$this->input->post('hak_akses');
            $users = array(
                            'id_alumni' =>$id_alumni,
                            'nama_users'=>$nama_users,
                            'pass_users'=>$password,
                            'Akses_users'=>$hak_akses,
            );
            $insert = $this->User_model->create('tbl_alumni',$alumni);
            $insert1 = $this->User_model->create('tbl_users',$users);
           
            redirect(base_url('admin/user'));
       
    }  //end masuk database
   
}

		//	$i = $this->input;
		//	$data = array(	'npm'			=>	$i->post('npm'),
							//'nama'			=>	$i->post('nama'),
							//'jurusan'		=>	$i->post('jurusan'),
							//'angkatan'		=>	$i->post('angkatan'),
							//'tahun_lulus'	=>	$i->post('tahun_lulus')
			//);

			//$this->User_model->tambah($data);
			//$this->session->set_flashdata('sukses', 'Data berhasil Ditambah');
			//redirect(base_url('admin/user'));
		//}
		//end masuk database
	//}

	//fungsi edit
	public function edit($id_alumni)
	{
		$tbl_alumni = $this->User_model->listing();
		$detail = $this->User_model->detail($id_alumni);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('npm', 'NPM', 'required', array(
						'required'	=>	'npm harus diisi'));
		$valid->set_rules('nama', 'Nama', 'required', array(
						'required'	=>	'Nama harus diisi'));
		$valid->set_rules('password_user', 'Password User', 'required', array(
						'required'	=>	'Password User harus diisi'));
		$valid->set_rules('jurusan', 'Jurusan', 'required', array(
						'required'	=>	'Jurusan harus diisi'));
		$valid->set_rules('angkatan', 'Angkatan', 'required', array(
						'required'	=>	'Angkatann harus diisi'));
		$valid->set_rules('tahun_lulus', 'Tahun Lulus', 'required', array(
						'required'	=>	'tahun_lulus harus diisi'));
		
		if($valid->run()===FALSE) {
			//end validasi
			$data = array(	'title'			=>	'Halaman edit user',
							'tbl_alumni'	=> 	$tbl_alumni,
							'detail'		=>	$detail,
							'isi'			=>	'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data);
		} else {
			$npm_user=$this->input->post('npm');
			$nama_user=$this->input->post('nama');
			$pass_users=$this->input->post('password_user');
			$password=md5($pass_users);
			$hak_akses=$this->input->post('hak_akses');
			$jurusan=$this->input->post('jurusan');
			$angkatan=$this->input->post('angkatan');
			$tahun_lulus=$this->input->post('tahun_lulus');
			$alumni = array(	
							'id_alumni'		=>	$id_alumni,
							'npm'			=>	$npm_user,
							'nama'			=>	$nama_user,
							'pass_users'	=>	$password,
							'Akses_users'	=>  $hak_akses,
							'jurusan'		=>	$jurusan,
							'angkatan'		=>	$angkatan,
							'tahun_lulus'	=>	$tahun_lulus
			);

			$this->User_model->edit($id_alumni,$npm_user,$nama_user,$password,$hak_akses,$jurusan,$angkatan,$tahun_lulus);
			$this->session->set_flashdata('sukses', 'Data berhasil diubah');
			redirect(base_url('admin/user'));
		}
		//end masuk database
	}

	//delete data
	public function delete($id_alumni)
	{
		$where=array('id_alumni'=>$id_alumni);
        $delete= $this->User_model->delete($where,'tbl_users');
        $delete1=$this->User_model->delete($where,'tbl_alumni');
		redirect(base_url('admin/user'));
	}
}
