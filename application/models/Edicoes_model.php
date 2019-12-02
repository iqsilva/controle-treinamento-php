<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edicoes_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	public function getEdicoes($courseId){
		$query = "
        	SELECT
        		Cod_Edicao AS edicaoId,
        		FORMAT(Data_Inicio,'dd/MM/yyyy') AS dataInicio,
        		FORMAT(Data_Fim,'dd/MM/yyyy') AS dataFim,
                FORMAT(Validade,'dd/MM/yyyy') AS validade
        	FROM
        		Edicao
        	WHERE
        		Status_Edicao = 'T'
        		AND
        		Cod_Curso = {$courseId}
                AND
                Data_Inicio >= GETDATE()
            ";
        $res = $this->db->query($query);
        return $res->result();
	}
    public function checkUserRequest($editionId, $userId){
        $query = "
            WITH slct AS (
                SELECT
                    c.Cod_Curso
                FROM
                    Edicao AS e
                    JOIN
                    Curso AS c
                    ON
                        c.Cod_Curso = e.Cod_Curso
                WHERE
                    e.Cod_Edicao = {$editionId}
            )
            SELECT
                *
            FROM
                Curso AS c
                JOIN
                Edicao AS e
                ON
                    c.Cod_Curso = e.Cod_curso
                JOIN
                Participa AS p
                ON
                    p.Cod_Edicao = e.Cod_Edicao
                JOIN
                slct
                ON
                    slct.Cod_Curso = c.Cod_Curso
            WHERE
                p.Status != 'R'
                AND
                p.Cod_Func = {$userId}";
        $res = $this->db->query($query);
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function insertRequest($editionId, $userId){
        $query ="INSERT INTO Participa VALUES('E', {$editionId}, {$userId})";
        $res = $this->db->query($query);
        return true;
    }
}