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
		//$this->load->model("Model_entretien");
	}

	public function add_Contrats_post()
	{
		$data = array(
			'nom' => $this->input->post('nom'),
			'soc' => $this->input->post('soc'),
			'cin' => $this->input->post('cin'),
			'tel' => $this->input->post('tel'),
			'mail' =>  $this->input->post('mail'),
			'objet' =>  $this->input->post('objet'),
			'date_travail' =>  $this->input->post('date_travail'),
			'autre' =>  $this->input->post('autre'),
			'lieu' =>  $this->input->post('lieu'),
			'date_recp' =>  $this->input->post('date_recp'),
			'lieu_recp' =>  $this->input->post('lieu_recp'),
			'prix' =>  $this->input->post('prix'),
			'avance' =>  $this->input->post('avance'),
			'reste' =>  $this->input->post('reste'),
			'date_paiement' =>  $this->input->post('date_paiement'),
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
			'nom' => $this->input->post('nom'),
			'soc' => $this->input->post('soc'),
			'cin' => $this->input->post('cin'),
			'tel' => $this->input->post('tel'),
			'mail' =>  $this->input->post('mail'),
			'objet' =>  $this->input->post('objet'),
			'date_travail' =>  $this->input->post('date_travail'),
			'autre' =>  $this->input->post('autre'),
			'lieu' =>  $this->input->post('lieu'),
			'date_recp' =>  $this->input->post('date_recp'),
			'lieu_recp' =>  $this->input->post('lieu_recp'),
			'prix' =>  $this->input->post('prix'),
			'avance' =>  $this->input->post('avance'),
			'reste' =>  $this->input->post('reste'),
			'date_paiement' =>  $this->input->post('date_paiement'),
		);
		$id=$this->input->post("id",TRUE);
		$update=$this->Model_generale->update_general($data,$id,"contrats","id");
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
