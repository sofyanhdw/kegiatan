<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Kegiatan_model extends CI_Model {
    private $table='tbl_kegiatan';
    private $table2='tbl_gambar';
    private $pk='id_kegiatan';
    public function __construct()
    {
        $this->load->database();
    }
 
    //listing
    public function listing()
    {
        $this->db->select("*");
        $this->db->from("tbl_kegiatan");
        $this->db->join('tbl_gambar','tbl_gambar.id_kegiatan = tbl_kegiatan.id_kegiatan');
       
        $query = $this->db->get();
        return $query->result();
    }
 
    //listing
    public function detail($id_kegiatan)
    {
        $this->db->select('
            tbl_kegiatan.judul,
            tbl_kegiatan.deskripsi,
            tbl_kegiatan.video,
            tbl_gambar.id_kegiatan,
            tbl_gambar.file_gambar
            ');
        $this->db->from('tbl_kegiatan');
        $this->db->join('tbl_gambar', 'tbl_gambar.id_kegiatan = tbl_kegiatan.id_kegiatan');
        $this->db->where('tbl_kegiatan.id_kegiatan',$id_kegiatan);
        $query = $this->db->get();
         if($query->num_rows() != 1){
            return FALSE;
        }
        return $query->row();
    }
        

    public function select_max(){
        $this->db->select_max('id_kegiatan');
        $query=$this->db->get('tbl_kegiatan');
    }
    public function limit(){
        $this->db->limit(1);
    }
 
    //tambah
      public function view_by($id_kegiatan){  
        $this->db->where('id_kegiatan', $id_kegiatan);  
         return $this->db->get('tbl_kegiatan')->row();  
     }
    public function create($table,$data)
    {
        $this->db->insert($table,$data);
 
        return $this->db->insert_id();
    }


    public  function edit_data($id_kegiatan,$judul_keg,$video,$Deskripsi,$nama_foto){
        //$hasil=$this->db->query(" UPDATE tbl_kegiatan set judul ='$judul' ,
//video = '$video' , deskripsi='$deskripsi'
//INNER JOIN tbl_gambar set nama_gambar='$nama_gambar' ON tbl_gambar.id_kegiatan = tbl_kegiatan.id_kegiatan  WHERE tbl_kegiatan.id_kegiatan='$id_kegiatan'");
        $hasil = $this->db->query("UPDATE tbl_kegiatan ,tbl_gambar  SET judul ='$judul_keg',video='$video',
            deskripsi='$Deskripsi',file_gambar='$nama_foto' WHERE tbl_kegiatan.id_kegiatan=tbl_gambar.id_kegiatan AND tbl_kegiatan.id_kegiatan = '$id_kegiatan'");
        return $hsl;
    }
   

  
    public function get_by_id($id){
        return $this->db->get_where('tbl_kegiatan',array('id_kegiatan'=>$id))->row();
    }
    public function delete($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

  
}