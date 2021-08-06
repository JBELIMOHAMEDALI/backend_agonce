<?php


class Modele_contrats extends CI_Model
{
	public function getAllContrant()
	{
		$sql="SELECT contrats.*,client.* from contrats join devi join client on contrats.id_devi=devi.id_devi and devi.id_client=client.id_client";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getContraBayClient($id)
	{
		$sql="select contrats.* from contrats join devi join client on contrats.id_devi=devi.id_devi and devi.id_client=client.id_client WHERE client.id_client=".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getDetailsContra($id)
	{
		$sql="SELECT devis.*,contrats.avance from contrats join devi join devis on devi.id_devi=contrats.id_devi and devis.id_devi_g= devi.id_devi WHERE contrats.id_contrat =".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getSumPrixContra($id)
	{
		$sql="SELECT sum(devis.tht) as tt from contrats join devi join devis on devi.id_devi=contrats.id_devi and devis.id_devi_g= devi.id_devi WHERE contrats.id_contrat =".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
