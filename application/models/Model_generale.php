<?php


class Model_generale extends CI_Model
{
	public function __construct()
	{
	}


	public function delete_fn($id,$tab,$nomIab){
		$this->db->where($nomIab, $id);
		$this->db->delete($tab);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function get_fn_Generale($id=null,$tabnam,$idname=null)
	{
		$this->db->select("*");
		$this->db->from($tabnam);
		if($id && $idname)
		{
			$this->db->where($idname,$id);
		}
		$query=$this->db->get();
		return $resulta = $query->result_array();
	}
	public function login($email, $password) {
		if($email && $password) {
			$sql = "select * from user where email= '".$email." ' and user.password= '".$password."'";
			$query = $this->db->query($sql);
			if($query->num_rows() == 1) {
				$result = $query->row_array();return $result;
			}
			else {
				return false;
			}
		}
	}
	public function add_fn($data,$tabName)
	{
		$status = $this->db->insert($tabName, $data);
		return($this->db->affected_rows() != 1) ? false : true;
	}
	public function update_general($data,$id,$tab,$nomId){
		$this->db->where($nomId,$id);
		$this->db->update($tab,$data);
		if($this->db->affected_rows()!=1){
			return false;
		}
		else {
			return true;
		}

	}
	public function countClient()
	{
		$sql="SELECT count(client.id_client) as nbr_cl from client";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function countDevis()
	{
		$sql="SELECT count(devi.id_devi) as nbr_dev from devi";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function countContra()
	{
		$sql="SELECT count(contrats.id_contrat) as nbr_cont from contrats";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}
