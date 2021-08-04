<?php


class Modele_Devi extends  CI_Model
{
//
	public function __construct()
	{
	}

	public function getAllDevi()
	{
		$sql="SELECT * from client join devi on devi.id_client=client.id_client";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
