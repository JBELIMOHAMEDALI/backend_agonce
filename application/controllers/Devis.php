<?php

require APPPATH . 'libraries/REST_Controller.php';

class Devis extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
		Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
		Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		//$this->load->model("Model_entretien");
	}


	public function add_Devis_post()
	{

		$data = array(
			'service' => $this->input->post('service'),
			'info' => $this->input->post('info'),
			'qte' => $this->input->post('qte'),
			'puht' => $this->input->post('puht'),
			'tva' =>  $this->input->post('tva'),
			'tht' =>  $this->input->post('tht'),
			'id_client' =>  $this->input->post('id_client'),

		);

		$create = $this->Model_generale->add_fn($data,"devis");
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
			'service' => $this->input->post('service'),
			'info' => $this->input->post('info'),
			'qte' => $this->input->post('qte'),
			'puht' => $this->input->post('puht'),
			'tva' =>  $this->input->post('tva'),
			'tht' =>  $this->input->post('tht'),
			'id_client' =>  $this->input->post('id_client'),
		);
		$id=$this->input->post("id",TRUE);
		$update=$this->Model_generale->update_general($data,$id,"devis","id");
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
}
