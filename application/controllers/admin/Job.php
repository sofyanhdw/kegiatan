<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('Job_model');
        }

	public function index()
	{
		$tbl_job = $this->Job_model->listing();
		$data = array(	'title'			=>	'Halaman Lowongan Pekerjaan',
						'tbl_job'		=> 	$tbl_job,
						'isi'			=>	'admin/job/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('job_title', 'Job Title', 'required', array(
						'required'	=>	'Title Job harus diisi'));
		$valid->set_rules('info', 'Info Lowongan', 'required', array(
						'required'	=>	'Info Lowongan harus diisi'));
		if($valid->run()===FALSE) {
			//end validasi
			$data = array(	'title'		=>	'Tambah Lowongan Pekerjaan',
							'isi'		=>	'admin/job/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(	'job_title'		=>	$i->post('job_title'),
							'info'			=>	$i->post('info')
			);

			$this->Job_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data berhasil Ditambah');
			redirect(base_url('admin/job'));
		}
		//end masuk database
	}

	//fungsi edit
	public function edit($id_job)
	{
		$tbl_job = $this->Job_model->listing();
		$detail = $this->Job_model->detail($id_job);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('job_title', 'Job Title', 'required', array(
						'required'	=>	'Title Job harus diisi'));
		$valid->set_rules('info', 'Info Lowongan', 'required', array(
						'required'	=>	'Info Lowongan harus diisi'));
		if($valid->run()===FALSE) {
			//end validasi
			$data = array(	'title'			=>	'Halaman edit Lowongan Pekerjaan',
							'tbl_alumni'	=> 	$tbl_job,
							'detail'		=>	$detail,
							'isi'			=>	'admin/job/edit'
					);
		$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(	
							'id_job'		=>	$id_job,
							'job_title'		=>	$i->post('job_title'),
							'info'			=>	$i->post('info')
			);

			$this->Job_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil diubah');
			redirect(base_url('admin/job'));
		}
		//end masuk database
	}

	//delete data
	public function delete($id_job)
	{
		$data = array('id_job'	=>	$id_job);
		$this->Job_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
		redirect(base_url('admin/job'));
	}
}
