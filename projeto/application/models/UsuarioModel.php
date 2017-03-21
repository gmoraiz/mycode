<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model {
    private $cd_usuario, $nm_usuario, $ds_email, $ds_senha;
    
    public function __init__($nome, $email, $senha, $codigo=0){
        $this->nm_usuario = $nome;
        $this->ds_email = $email;
        $this->ds_senha = $senha;
        $this->cd_usuario = $codigo;
    }
    
    //Como o codeigneter proibe o uso de váriaveis privadas, que vem de encontro ao paradigma orientado à objetos,
    //formulei esta função para contornar esta situação da framework.
    public function obj(){
        return get_object_vars($this);
    }
}