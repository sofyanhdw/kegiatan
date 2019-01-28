<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Kegiatan extends CI_Controller {
 
     public function __construct()
        {
                parent::__construct();
                $this->load->model('Kegiatan_model');
                $this->load->library(array('session', 'form_validation','table'));
                $this->load->helper(array('form', 'url','file'));
                $this->load->database();
        }
 
    public function index()
    {
        $tbl_kegiatan = $this->Kegiatan_model->listing();
        $data = array(  'title'         =>  'Halaman Kegiatan Alumni',
                        'tbl_kegiatan'      =>  $tbl_kegiatan,
                        'isi'           =>  'admin/kegiatan/list'
                    );
        $this->load->view('admin/layout/wrapper', $data);

    }
 

    public function tambah()
    {
        //validasi
//  $valid = $this->form_validation;
      
            //end validasi
        $valid = $this->form_validation;
        $valid->set_rules('judul', 'Judul gambar', 'required', array(
                        'required'  =>  'Judul gambar harus diisi'));
        $valid->set_rules('video', 'Video Kegiatan', 'required', array(
                        'required'  =>  'Video Kegiatan harus diisi'));
        $valid->set_rules('deskripsi', 'Deskripsi Kegiatan', 'required', array(
                        'required'  =>  'Deskripsi Kegiatan harus diisi'));
      //  $valid->set_rules('upload_gambar', 'upload_gambar', 'required', array(
                      //  'required'  =>  'gambar harus diupload'));
        if($valid->run()===FALSE) {
            //end validasi
            $data = array(  'title'     =>  'Tambah Kegiatan Alumni',
                            'isi'       =>  'admin/kegiatan/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data);
      
    //else{

        //if ($this->form_validation->run() == FALSE){
    }
        else{

            // if(isset($_POST['submit'])){
           
       
          //  $judul = $this->input->post('judul');
           // $this->form_validation->set_rules('judul','judul kegiatan harus diisi...','required');

             $Deskripsi = $this->input->post('deskripsi');
             $video = $this->input->post('video');
             $kegiatan = array(
                                'judul'=> $this->input->post('judul'),
                                'deskripsi'=>$Deskripsi,
                                'video'=>$video
                                
 
           // 'id_kegiatan'=>$id_kegiatan_insert
                );     
            
          
            //$this->load->library('upload');
            $config['upload_path']          ='./assets/images/';
            $config['allowed_types']        ='gif|jpg|png|jpeg';
           // $config['file_name']            =$this->file_gambar;
            $config['max_size']             = 100;
            $config['overwrite']            =true;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $nama_file="gambar_".time();
            $config['file_name']            =$nama_file;
           $this->load->library('upload',$config);
           // if($_FILES['upload_gambar']['name']){

           $id_kegiatan=$this->Kegiatan_model->create('tbl_kegiatan',$kegiatan);
               //   $field_name="upload_gambar";
             
             if($this->upload->do_upload('upload_gambar')){
                   // $gambar_new=$this->upload->data();
            
            
            $gambar=array(
                          'id_kegiatan' =>$id_kegiatan,
                          'file_gambar'=>$this->upload->data('file_name'));
           // $this->load->library('upload',$config);
          //  $id_kegiatan=$this->Kegiatan_model->create('tbl_kegiatan',$kegiatan);
           // $nama_gambar=$upload['file']['file_name'];
           //$nama_gambar=$this->upload->do_upload('upload_gambar');
          // $result=$this->upload->data();
          
            $insert = $this->Kegiatan_model->create('tbl_kegiatan',$kegiatan);
            $insert1 = $this->Kegiatan_model->create('tbl_gambar',$gambar);
            $this->session->set_flashdata('sukses', 'Data berhasil Ditambah');
            redirect(base_url('admin/kegiatan'));
     // } 

       

       
   }

    }   //end masuk database
   
}
 
 
    //fungsi edit
    public function edit_data($id_kegiatan)
    {
        $tbl_kegiatan = $this->Kegiatan_model->listing();
        $detail = $this->Kegiatan_model->detail($id_kegiatan);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('judul_keg', 'Judul Kegiatan', 'required', array(
                        'required'  =>  'Judul Kegiatan harus diisi'));
        $valid->set_rules('video', 'Video', 'required', array(
                        'required'  =>  'Video harus diisi'));
        $valid->set_rules('Deskripsi_keg', 'Deskripsi Kegiatan', 'required', array(
                        'required'  =>  'Deskripsi Kegiatan harus diisi'));
        if($valid->run()===FALSE) {
            //end validasi
            $data = array(  'title'         =>  'Halaman edit Data Alumni',
                            'tbl_alumni'    =>  $tbl_kegiatan,
                            'detail'        =>  $detail,
                            'isi'           =>  'admin/kegiatan/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data);
        } else {
             //$this->load->library('upload');
             $config['upload_path']          ='./assets/images/';
            $config['allowed_types']        ='gif|jpg|png|jpeg';
           // $config['file_name']            =$this->file_gambar;
            $config['max_size']             = 100;
            $config['overwrite']            =true;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $nama_file="gambar_".time();
            $config['file_name']            =$nama_file;
            $this->load->library('upload',$config);
             if($this->upload->do_upload('update_gambar')){
            $finfo = $this->upload->data();
             $nama_foto = $finfo['file_name'];
             $judul_keg= $this->input->post('judul_keg');
             $Deskripsi = $this->input->post('Deskripsi_keg');
             $video = $this->input->post('video');
             $kegiatan = array(
                                'judul'=>$judul_keg,
                                'deskripsi'=>$Deskripsi,
                                'video'=>$video,
                                'id_kegiatan'=>$id_kegiatan,
                                'file_gambar'=>$nama_foto
                       
            );
            
      
            $Update= $this->Kegiatan_model->edit_data($id_kegiatan,$judul_keg,$video,$Deskripsi,$nama_foto);
            $this->session->set_flashdata('sukses', 'Data berhasil diubah');
            redirect(base_url('admin/kegiatan'));
        }
        }
       
}
    public function pilih(){
 
       
    }
    //delete data
    public function delete($id_kegiatan)
    {
            $where=array('id_kegiatan'=>$id_kegiatan);
            $delete= $this->Kegiatan_model->delete($where,'tbl_gambar');
            $delete1=$this->Kegiatan_model->delete($where,'tbl_kegiatan');
            $this->session->set_flashdata('sukses', 'Data berhasil Dihapus');
            redirect(base_url('admin/kegiatan'));
    }
}