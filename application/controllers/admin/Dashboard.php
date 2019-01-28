<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data = array(	'title'		=>	'Halaman Dashboard',
						'isi'		=>	'admin/dashboard/list'
					);
		$this->load->view('admin/layout/wrapper', $data);
	}
}
