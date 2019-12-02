<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados_model extends CI_Model {
	
	public function get_info($certificadoId)
	{
	    $query = "
	        SELECT
	           c.Descricao AS curso,c.Carga_Horaria AS carga,FORMAT(e.Validade,'dd/MM/yyyy') AS validade,
	            p.Cod_Participa as cod_participa, f.Nome_Func as nome, FORMAT(getdate(),'dd/MM/yyyy') AS hoje
	        FROM
	            Curso AS c
	        INNER JOIN
	            Edicao AS e
	            ON
	                c.Cod_Curso = e.Cod_curso
	        INNER JOIN
	            Participa AS p
	            ON
	                p.Cod_Edicao = e.Cod_Edicao
	        INNER JOIN
	            Funcionario AS f
	            ON
	                f.Cod_Func = p.Cod_Func
	        WHERE
	            p.Cod_Participa ={$certificadoId}";
	    $res = $this->db->query($query);
	    return $res->result();
	}
}