<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function listarCursos($funcionarioId)
    {
        //objetivo listar somente os cursos que o funcionário ainda não possui ou foi reporvado
        $query = "
                SELECT
                    *
                FROM
                    Curso AS c
                WHERE
                    c.Status = 'T'
                    AND
                    c.Cod_Curso
                    NOT IN
                    (SELECT
                        c.Cod_Curso AS Cod_Curso
                    FROM
                        Curso AS c
                        JOIN
                        Edicao AS e
                        ON
                            c.Cod_Curso = e.Cod_curso
                        JOIN
                        Participa AS p
                        ON
                            e.Cod_Edicao = p.Cod_Edicao
                    WHERE 
                        c.Status = 'T'
                        AND
                        p.Cod_Func = {$funcionarioId}
                        AND
                        (p.Status = 'A' OR p.Status = 'C')
                    GROUP BY
                        c.Cod_Curso)";
        $res = $this->db->query($query);
        return $res->result();
    }
    public function listarCursosAndamento($funcionarioId)
    {
        $query = "
            SELECT
                c.Descricao AS descricao,FORMAT(e.Data_Inicio,'dd/MM/yyyy') AS dataInicio
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
            WHERE
                p.Status = 'A'
                AND
                p.Cod_Func = {$funcionarioId}";
        $res = $this->db->query($query);
        return $res->result();
    }
    public function listarCursosFinalizados($funcionarioId)
    {
        $query = "
            SELECT
                c.Descricao AS descricao,FORMAT(e.Validade,'dd/MM/yyyy') AS validade, p.Cod_Participa as CodParticipa
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
            WHERE
                p.Status = 'C'
                AND
                p.Cod_Func = {$funcionarioId}";
        $res = $this->db->query($query);
        return $res->result();
    }
    public function listarCursosEspera($funcionarioId)
    {
        $query = "
            SELECT
                c.Descricao AS descricao,FORMAT(e.Data_Inicio,'dd/MM/yyyy') AS dataInicio
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
            WHERE
                p.Status = 'E'
                AND
                p.Cod_Func = {$funcionarioId}";
        $res = $this->db->query($query);
        return $res->result();
    }
}