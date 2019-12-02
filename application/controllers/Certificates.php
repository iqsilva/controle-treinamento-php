<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        $this->load->model('Certificados_model');
        $this->load->library('PHPImage');
    }

	public function index(){

		if( empty($this->input->post()) ){
			return FALSE;
		}

		$cod_pariticipa = $this->input->post('CodParticipa');

		$data['info'] = $this->Certificados_model->get_info($cod_pariticipa);

		$background_image = 'assets/img/certificate/certificado.png';

		$this->certificate($data['info'], $background_image);
	}

	private function certificate($data, $background){
		// Main image
		$image = new PHPImage();
		$image->setDimensionsFromImage($background);
		$image->draw($background);
		
		$image->setFont('assets/font/arial.ttf');
		$image->setTextColor(array(0, 0, 0));

		$image->text($data[0]->nome, array('fontSize' => 15, 'x' => 245, 'y' => 220));
		$image->text($data[0]->curso, array('fontSize' => 15, 'x' => 395, 'y' => 264));
		$image->text($data[0]->carga.' horas.', array('fontSize' => 15, 'x' => 285, 'y' => 312));
		$image->text($data[0]->hoje, array('fontSize' => 15, 'x' => 125, 'y' => 357));
		$image->text($data[0]->validade, array('fontSize' => 15, 'x' => 190, 'y' => 388));
		$image->show();
	}
}