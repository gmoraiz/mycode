<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaModel extends CI_Model {
    private $cd_categoria, $nm_categoria, $ic_ativo;
    
    public function __init__($nome, $ativo, $codigo=0){
        $this->nm_categoria = $nome;
        $this->ic_ativo = $ativo;
        $this->cd_categoria = $codigo;
    }
    
    //Como o codeigneter proibe o uso de váriaveis privadas, que vem de encontro ao paradigma orientado à objetos,
    //formulei esta função para contornar esta situação da framework.
    public function obj(){
        return get_object_vars($this);
    }
}