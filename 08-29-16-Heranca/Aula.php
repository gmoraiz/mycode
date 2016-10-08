<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Herança</title>
        <style>
        </style>
    </head>
    <body>
        <?php
            class Potion {
                
                public function uso(Pokemon $p){
                    $p->tomarDano(-10);
                }
            }
            
            class Pokemon{
                public $forca, $hp, $tipo, $item;
                
                public function __construct($forca, $hp){
                    $this->forca = $forca;
                    $this->hp = $hp;
                }
                
                public function mostrarStatus(){
                    echo "<p> Forca: $this->forca </p>";
                    echo "<p> HP: $this->hp </p>";
                    echo "<p> Tipo: $this->tipo </p>";
                }
                
                public function estaVivo(){
                    return $this->hp > 0;
                }
                
                public function tomarDano($fator){
                    $this->hp = $this->hp - $fator;
                }
                
                public function comprarItem(Potion $potion){
                    $this->item = $potion;
                }
                
                public function usarItem(){
                    if($this->item == null){
                        return "Sem itens";
                    }else{
                        $this->item->uso($this);
                    }
                }
            }
            
            class Squirtle extends Pokemon{
                
                public function __construct($hp, $forca){
                    $this->tipo = "Agua";
                    parent::__construct($hp, $forca);
                }
                
                public function jatoDagua(Pokemon $p){
                    if(!$p->estaVivo() || !$this->estaVivo()){
                        return "Pokemon esta faint";
                    }
                    if($p->tipo === "Fogo"){
                        $p->tomarDano(2*$this->forca);
                    }else{
                        $p->tomarDano(round(0.5*$this->forca));
                    }
                }
                
            }
            
            class Bulbassaur extends Pokemon{
                
                public function __construct($hp, $forca){
                    $this->tipo = "Grama";
                    parent::__construct($hp, $forca);
                }
                
                public function folhaNavalha(Pokemon $p){
                    if(!$p->estaVivo() || !$this->estaVivo()){
                        return "Pokemon esta faint";
                    }
                    if($p->tipo === "Agua"){
                        $p->tomarDano(2.5*$this->forca);
                    }else{
                        $p->tomarDano(round(0.2*$this->forca));
                    }
                }
                
            }
            
            
            $p = new Squirtle(10,30);
            $q = new Bulbassaur(15,20);
            $q->folhaNavalha($p);
            $p->jatoDagua($q);
            $q->folhaNavalha($p);
            $p->jatoDagua($q);
            $q->comprarItem(new Potion());
            $q->usarItem();
            $p->mostrarStatus();
            $q->mostrarStatus();
        ?>
    </body>
</html>