<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edicoes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Edicoes_model');
	}
	public function getEditions(){
		$courseId = htmlentities($this->input->post('courseId'));
		$data['edicao'] = $this->Edicoes_model->getEdicoes($courseId);
		if(!empty($data['edicao'])){
			echo json_encode($data);
		}else{
			return;
		}
	}
	public function insertSolicitation(){
		$editionId = htmlentities($this->input->post('editionId'));
		$userId = htmlentities($this->session->userdata("id"));
		//VERIFCICA SE O USUÁRIO JÁ SOLICITOU O CURSO
		if($this->Edicoes_model->checkUserRequest($editionId, $userId)){
			return;
		}else{
			$this->Edicoes_model->insertRequest($editionId,$userId);
			echo json_encode('Sucesso');
		}
	}
}