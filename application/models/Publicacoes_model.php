<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacoes_model extends CI_Model {

	public $postagemId;
	public $categoriaId;
	public $titulo;
	public $subtitulo;
	public $conteudo;
	public $data;
	public $imagem;
	public $usuarioId;

	public function __construct()
	{
		parent::__construct();
	}

	public function destaquesHome(){
		$this->db->limit(4);
		$this->db->order_by('Data','DESC');
		return $this->db->get('Postagens')->result();
	}

}
