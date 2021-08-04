<?php

require APPPATH . 'libraries/REST_Controller.php';

class Client extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
		Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
		Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		//$this->load->model("Model_entretien");
	}

	public function add_client_post()
	{

		$img=$_FILES['file']['name'];
		$extension=pathinfo($img,PATHINFO_EXTENSION);
		$random=rand(0,100000);
		$rename='Upload'.date('Ymd').$random;
		$newname=$rename.'.'.$extension;
		$filename=$_FILES['file']['tmp_name'];
		$appImg=move_uploaded_file($filename,'G:/En Cours/FrontEndAgonce/src/assets/logo_client/'.$newname);// COPIE O DE L4AMPLACEMET du fichier et donne nv nom
		$data = array(
			'name' => $this->input->post('name'),
			'nom_soc' => $this->input->post('nom_soc'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'logo' =>$newname,
			'address' =>  $this->input->post('address'),
			'facebook' =>  $this->input->post('facebook'),
			'twitter' =>  $this->input->post('twitter'),
			'google_plus_link' =>  $this->input->post('google_plus_link'),
			'linkedin' =>  $this->input->post('linkedin'),
		);

			$create = $this->Model_generale->add_fn($data,"client");
			if ($create) {
				$res = array(
					'erorer' => false,
					'msg' => "chauffeur Ajouté avec succès"
				);
				$this->response($res, REST_Controller::HTTP_OK);
			} else {
				$res = array(
					'erorer' => true,
					'msg' => "Ajouté d'un chauffeur n'a pas réussi"
				);
				$this->response($res, REST_Controller::HTTP_NOT_FOUND);
			}

	}
	public function update_client_post () {
		$data = array(
			'name' => $this->input->post('name'),
			'nom_soc' => $this->input->post('nom_soc'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' =>  $this->input->post('address'),
			'facebook' =>  $this->input->post('facebook'),
			'twitter' =>  $this->input->post('twitter'),
			'google_plus_link' =>  $this->input->post('google_plus_link'),
			'linkedin' =>  $this->input->post('linkedin'),
		);
		$id=$this->input->post("id",TRUE);
		$update=$this->Model_generale->update_general($data,$id,"client","id_client");
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
