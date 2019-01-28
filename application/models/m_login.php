<?php
class m_login extends CI_model{
	
	function cek_login($username,$passwordx){
		$query=$this->db->query("select * from tbl_users where nama_users = '$username' and pass_users='$passwordx' limit 1");
		return $query;
	}
	
}




?>