<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisciplinaModel extends CI_Model {
    private $id, $nome, $descricao;
    
    public function __init__($nome, $descricao,$id=0){
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->id = $id;
    }
    
    public function mostrar(){
        
    }
    
    public function toArray(){
        return get_object_vars($this);
    }
}