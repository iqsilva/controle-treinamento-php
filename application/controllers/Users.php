<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Usuarios_model');
        $this->load->model('Cursos_model');
        $this->load->library('session');

	}
    public function login()
    {
        $data = array();
        //INFORMAÇÕES DO LOGIN
        if($this->input->post()){
            $username = htmlentities($this->input->post('username', TRUE));
            $password = htmlentities($this->input->post('password', TRUE));
            $data['usuario'] = $this->Usuarios_model->check_login($username, $password);
            if(!$data['usuario']){ 
                $this->session->set_flashdata('loginError', 'Usuário ou senha incorretos');
                redirect(base_url());
                //USUÁRIO OU SENHA INCORRETOS
            }else{
                //USUÁRIO EXISTE E FARÁ O LOGIN
                $this->session->set_userdata('id', $data['usuario'][0]->id);
                $this->session->set_userdata('usuario', $data['usuario'][0]->usuario);
                $this->session->set_userdata('nome', $data['usuario'][0]->nome);
                $this->session->set_userdata('funcao', $data['usuario'][0]->funcao);
                $this->session->set_userdata('email', $data['usuario'][0]->email);
                $this->session->set_userdata('registro', $data['usuario'][0]->registro);
                
                $data['cursos'] = $this->Cursos_model->listarCursos($this->session->userdata("id"));

                $this->load->view('template/html-header');
                $this->load->view('template/header',$data);
                $this->load->view('home');
                $this->load->view('template/footer');
                $this->load->view('template/html-footer');
            }
        }
    }
    public function alterprofile()
    {
        $data = array();
        //INFORMAÇÕES DO LOGIN
        if($this->input->post()){
            $username = $this->session->userdata('usuario');
            $email = htmlentities($this->input->post('email', TRUE));
            $password = htmlentities($this->input->post('password', TRUE));
            $newpassword = htmlentities($this->input->post('newpassword', TRUE));
            $data['usuario'] = $this->Usuarios_model->check_login($username, $password);
            
            if(!$data['usuario']or(!$email and !$newpassword) or ($newpassword==$password)){ 
                $this->session->set_flashdata('alterError', 'Dados Inválidos ou senha incorreta!');
                redirect(base_url(profile));
                //SENHA INCORRETA
            }else if ($email==$this->session->userdata('email') and $email) {
                $this->session->set_flashdata('alterError', 'E-mail existente!');
                redirect(base_url(profile));
                //Email EXISTENTE
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL) and $email) {
                $this->session->set_flashdata('alterError', 'E-mail Inválido!');
                redirect(base_url(profile));
                //Email invalido
            }else if (strlen($newpassword)<4 and $newpassword) {
                $this->session->set_flashdata('alterError', 'Nova Senha Inválida!');
                redirect(base_url(profile));
                //Nova Senha invalida
            } else{
                //DADOS VALIDOS, ALTERAÇÃO
                try{
                    if ($email) {
                        $this->Usuarios_model->alter_email($email,$this->session->userdata("id"));
                        $this->session->set_userdata('email', $email);
                    }
                    if ($newpassword) {
                        $this->Usuarios_model->alter_password($newpassword,$this->session->userdata("id"));
                    }
                }catch (Exception $e){
                        $this->session->set_flashdata('alterError', 'Erro Misterioso');
                        $this->Usuarios_model->alter_email($this->session->userdata("email"),$this->session->userdata("id"));
                        $this->Usuarios_model->alter_password($password,$this->session->userdata("id"));
                        redirect(base_url(profile));
                }
                $this->session->set_flashdata('alter', 'Alterado com Sucesso');
                if ($email) {
                    $this->session->set_userdata('email', $email);
                }
                redirect(base_url(profile));
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function profile(){
        $this->load->view('template/html-header');
        $this->load->view('template/header');
        $this->load->view('perfil');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

}