<?php

require APPPATH . 'libraries/REST_Controller.php';


class Contrats extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
		Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
		Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		$this->load->model("Modele_contrats");
	}

	public function add_Contrats_post()
	{
		$data = array(
			'autre' => $this->input->post('autre'),
			'lieu' => $this->input->post('lieu'),
			'date_recp' => $this->input->post('date_recp'),
			'lieu_recp' => $this->input->post('lieu_recp'),
			'avance' =>  $this->input->post('avance'),
			'id_devi' =>  $this->input->post('id_devi'),
		);


		$create = $this->Model_generale->add_fn($data,"contrats");
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
	public function update_Contrats_post () {
		$data = array(
			'autre' => $this->input->post('autre'),
			'lieu' => $this->input->post('lieu'),
			'date_recp' => $this->input->post('date_recp'),
			'lieu_recp' => $this->input->post('lieu_recp'),
			'prix' =>  $this->input->post('prix'),
			'avance' =>  $this->input->post('avance'),
			'reste' =>  $this->input->post('reste'),
			'id_devi' =>  $this->input->post('id_devi'),
		);

		$id=$this->input->post("id",TRUE);
		$update=$this->Model_generale->update_general($data,$id,"contrats","id_contrat ");
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
	public function get_all_Contrant_Get()
	{
		$data = $this->Modele_contrats->getAllContrant();
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
	public function get_all_Contrant_by_client_Get()
	{
		$id = $this->input->get('id', TRUE);
		$data = $this->Modele_contrats->getContraBayClient($id);
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

	public function get_all_Contrant_Detaile_Get()
	{
		$id = $this->input->get('id', TRUE);
		$data = $this->Modele_contrats->getDetailsContra($id);
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
	public function get_all_Contrant_totale_Prix_Get()
	{
		$id = $this->input->get('id', TRUE);
		$data = $this->Modele_contrats->getSumPrixContra($id);
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
	//


}
