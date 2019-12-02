<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function check_login($username, $password)
    {
        $query = "
            SELECT
                Cod_Func AS id,
                Nome_Usuario AS usuario,
                Funcao AS funcao,
                Registro_Empregado AS registro,
                Nome_Func AS nome,
                Email_Func AS email
            FROM
                Funcionario
            WHERE
                Status = 'T'
                AND
                Nome_Usuario = '{$username}'
                AND
                Senha = '{$password}'
            ";
        $res = $this->db->query($query);
        return $res->result();
    }

    public function alter_email($email,$funcionarioId)
    {
        $query = "
            UPDATE 
                Funcionario
            SET 
                Email_Func = '{$email}'
            WHERE 
                Cod_Func = '{$funcionarioId}'
            ";
        $res = $this->db->query($query);
    }

    public function alter_password($password,$funcionarioId)
    {
        $query = "
            UPDATE 
                Funcionario
            SET 
                Senha = '{$password}'
            WHERE 
                Cod_Func = '{$funcionarioId}'
            ";
        $res = $this->db->query($query);
    }
}