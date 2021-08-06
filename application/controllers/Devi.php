<?php

require APPPATH . 'libraries/REST_Controller.php';

class Devi extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
		Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
		Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		$this->load->model("Modele_Devi");
	}
	public function add_Devi_post()
	{

		$data = array(
			'id_client' => $this->input->post('id_client'),
		);

		$create = $this->Model_generale->add_fn($data,"devi");
		if ($create) {
			$res = array(
				'erorer' => false,
				'msg' => "contrats Ajouté avec succès"
			);
			$this->response($res, REST_Controller::HTTP_OK);
		} else {
			$res = array(
				'erorer' => true,
				'msg' => "Ajouté d'un contrats n'a pas réussi"
			);
			$this->response($res, REST_Controller::HTTP_NOT_FOUND);
		}

	}
	public function update_Devis_post () {
		$data = array(
			'id_devis' => $this->input->post('id_devis'),
		);
		$id=$this->input->post("id",TRUE);
		$update=$this->Model_generale->update_general($data,$id,"devi","id_devi");
		if($update==true) {
			$res=array (
				"errorer" =>false,
				"msg"=>"update avec susses"
			);
			$this->response($res, REST_Controller::HTTP_OK);
		}
		else {
			$res=array (
				"errorer" =>true,
				"msg"=>"update n'est pas reusi"
			);
			$this->response($res, REST_Controller::HTTP_OK);

		}
	}
	public function get_all_Devi_Get()
	{
		$data = $this->Modele_Devi->getAllDevi();
		$total = count($data);
		if ($total != 0) {
			$res = array(
				'erorer' => false,
				'msg' => $data

			);
			$this->response($res, REST_Controller::HTTP_OK);
		} else {
			$res = array(
				'erorer' => true,
				'msg' => "Pas Des Donne "
			);

			$this->response($res, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function get_all_Detaile_Devi_Get()
	{
		$id = $this->input->get('id', TRUE);
		$data = $this->Modele_Devi->getAllDetaileDevi($id);
		$total = count($data);
		if ($total != 0) {
			$res = array(
				'erorer' => false,
				'msg' => $data

			);
			$this->response($res, REST_Controller::HTTP_OK);
		} else {
			$res = array(
				'erorer' => true,
				'msg' => "Pas Des Donne "
			);

			$this->response($res, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function get_Devi_bay_client_Get()
	{
		$id = $this->input->get('id', TRUE);

		$data = $this->Modele_Devi->getDeviBayCient($id);
		$total = count($data);
		if ($total != 0) {
			$res = array(
				'erorer' => false,
				'msg' => $data

			);
			$this->response($res, REST_Controller::HTTP_OK);
		} else {
			$res = array(
				'erorer' => true,
				'msg' => "Pas Des Donne "
			);

			$this->response($res, REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function get_Devi_Detaile_Print_Get()
	{
		$id = $this->input->get('id', TRUE);

		$data = $this->Modele_Devi->getDetaileDevisPrint($id);
		$total = count($data);
		if ($total != 0) {
			$res = array(
				'erorer' => false,
				'msg' => $data

			);
			$this->response($res, REST_Controller::HTTP_OK);
		} else {
			$res = array(
				'erorer' => true,
				'msg' => "Pas Des Donne "
			);

			$this->response($res, REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function get_Devi_tt_prix_Get()
	{
		$id = $this->input->get('id', TRUE);

		$data = $this->Modele_Devi->getSomeDevisPrint($id);
		$total = count($data);
		if ($total != 0) {
			$res = array(
				'erorer' => false,
				'msg' => $data

			);
			$this->response($res, REST_Controller::HTTP_OK);
		} else {
			$res = array(
				'erorer' => true,
				'msg' => "Pas Des Donne "
			);

			$this->response($res, REST_Controller::HTTP_NOT_FOUND);
		}
	}
}
