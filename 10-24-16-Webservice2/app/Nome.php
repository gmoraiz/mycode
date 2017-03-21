<?php

interface NomeResource{
    function manipular($id);
} 

class NomeResourcePOST implements NomeResource{
    
    public function manipular($id=0){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $ndao = new NomeDAO();
        $ndao->inserir($obj);
        echo "Ok!";
    }
}

class NomeResourceDELETE implements NomeResource{
    
    public function manipular($id=1){
      $ndao = new NomeDAO();
      $ndao->deletar($id);
    }
}

class NomeResourcePUT implements NomeResource{
    public function manipular($id=1){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $ndao = new NomeDAO();
        $ndao->atualizar($id, $obj);
    }
}

class NomeResourceGET implements NomeResource{
    
    public function manipular($id=1){
        $ndao = new NomeDAO();
        echo $ndao->getNome($id);
    }
    
    public function todos(){
        echo "Error";
        http_response_code(405);
    }
}

?>