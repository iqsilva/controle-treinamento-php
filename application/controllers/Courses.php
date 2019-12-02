<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        $this->load->model('Cursos_model');
    }
    public function index(){
        $data['cursos'] = $this->Cursos_model->listarCursos($this->session->userdata("id"));
        $this->load->view('template/html-header');
        $this->load->view('template/header',$data);
        $this->load->view('home');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }
    public function ongoing(){
        $data['andamento'] = $this->Cursos_model->listarCursosAndamento($this->session->userdata("id"));
        $this->load->view('template/html-header');
        $this->load->view('template/header',$data);
        $this->load->view('andamento');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');    
    }
    public function finished(){
        $data['finalizados'] = $this->Cursos_model->listarCursosFinalizados($this->session->userdata("id"));
        $this->load->view('template/html-header');
        $this->load->view('template/header',$data);
        $this->load->view('finalizados');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');    
    }
    public function onhold(){
        $data['espera'] = $this->Cursos_model->listarCursosEspera($this->session->userdata("id"));
        $this->load->view('template/html-header');
        $this->load->view('template/header',$data);
        $this->load->view('espera');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');    
    }
    public function certificate()
    {
        $data = array();
        //INFORMAÇÕES DO CERTIFICADO
        if($this->input->post()){
            $participaCod = $this->input->post('CodParticipa', TRUE);
            $data['certificado'] = $this->Cursos_model->certificado($participaCod);
            //print_r($data); // data OK!
            
            $this->load->view('certificado');
        }
    }
}