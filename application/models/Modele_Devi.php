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
	//

	public function getAllDetaileDevi($id)
	{
		$sql="SELECT * from devi join devis join client on devi.id_devi=devis.id_devi_g and client.id_client=devi.id_client WHERE devi.id_devi= ".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getDeviBayCient($id)
	{
		$sql="SELECT * from devi join client on devi.id_client=client.id_client WHERE client.id_client= ".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getDetaileDevisPrint($id)
	{
		$sql="SELECT * from devis join devi on devis.id_devi_g=devi.id_devi WHERE devi.id_devi= ".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getSomeDevisPrint($id)
	{
		$sql="SELECT sum(devis.tht) as tt from devis join devi on devis.id_devi_g=devi.id_devi WHERE devi.id_devi= ".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}


}
