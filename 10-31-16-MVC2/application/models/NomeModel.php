<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NomeModel extends CI_Model {
    // para usar o ORM, o nome dos atributos tem que ser o nome das colunas no banco.
    private $nm_login;
    // init é o construtor da framework.
    public function init($nm_login){
        $this->nm_login = $nm_login;
    }
    
    public function mostrar(){
        echo $this->nm_login;
    }
    
    public function toArray(){
        //Como a framework não aceita atributos privados, usaremos esse método para inserir atributos
        //privados no banco.
        return get_object_vars($this);
    }
}

?>