<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NoticiaModel extends CI_Model {
    private $cd_noticia, $nm_noticia, $ds_noticia, $dt_noticia, $ds_imagem, $cd_usuario, $cd_categoria;
    
    public function __init__($nome, $descricao, $data, $imagem, $cd_usuario, $cd_categoria, $codigo=0){
        $this->cd_noticia = $codigo;
        $this->nm_noticia = $nome;
        $this->ds_noticia = $descricao;
        $this->dt_noticia = $data;
        $this->ds_imagem = $imagem;
        $this->cd_usuario = $cd_usuario;
        $this->cd_categoria = $cd_categoria;
    }
    
    //Como o codeigneter proibe o uso de váriaveis privadas, que vem de encontro ao paradigma orientado à objetos,
    //formulei esta função para contornar esta situação da framework.
    public function obj(){
        return get_object_vars($this);
    }
}