<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	private $table='tbl_alumni';
    private $table2='tbl_users';
    private $pk='id_alumni';
	public function __construct() 
	{
		$this->load->database();
	}

	//listing
	public function listing() 
	{
		$this->db->select("*");
        $this->db->from("tbl_alumni");
        $this->db->join('tbl_users','tbl_users.id_alumni = tbl_alumni.id_alumni');
        $this->db->order_by('id_users', 'desc');
        $query = $this->db->get();
        return $query->result();
	}

	//listing
	public function detail($id_alumni) 
	{
		 $this->db->select('
            tbl_alumni.npm,
            tbl_alumni.jurusan,
            tbl_alumni.angkatan,
            tbl_alumni.tahun_lulus,
            tbl_users.id_alumni,
            tbl_users.nama_users,
            tbl_users.pass_users,
            tbl_users.Akses_users
            ');
        $this->db->from('tbl_alumni');
        $this->db->join('tbl_users', 'tbl_users.id_alumni = tbl_alumni.id_alumni');
        $this->db->where('tbl_alumni.id_alumni',$id_alumni);
        $query = $this->db->get();
         if($query->num_rows() != 1){
            return FALSE;
        }
        return $query->row();
    }
        
	
	public function select_max(){
        $this->db->select_max('id_alumni');
        $query=$this->db->get('tbl_alumni');
    }
    public function limit(){
        $this->db->limit(1);
    }
    public function view_by($id_alumni){  
        $this->db->where('id_alumni', $id_alumni);  
         return $this->db->get('tbl_alumni')->row();  
     }
	//tambah
	 public function create($table,$data)
    {
        $this->db->insert($table,$data);
 
        return $this->db->insert_id();
    }
 
	//edit
	public function edit($id_alumni,$npm_user,$nama_user,$password,$hak_akses,$jurusan,$angkatan,$tahun_lulus)
	{
		 $hasil = $this->db->query("UPDATE tbl_alumni ,tbl_users  SET npm ='$npm_user',nama_users='$nama_user',
            pass_users='$password',Akses_users='$hak_akses' ,jurusan='$jurusan',angkatan='$angkatan', tahun_lulus='$tahun_lulus'
            WHERE tbl_alumni.id_alumni=tbl_users.id_alumni AND tbl_alumni.id_alumni = '$id_alumni'");
        return $hsl;
	}

	//edit
	public function delete($where,$table)
	{
		$this->db->where($where);
        $this->db->delete($table);
	}
}