<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Abstração</title>
</head>
<body>
    <?php
            interface Surfavel{
                 public function surfar();    
            }
            
            abstract class TipoPokemon{
                private $fatorDano;
                
                public function __construct(){
                    $this->fatorDano = 1;
                }
                
                public function getFatorDano(){
                    return $this->fatorDano;
                }
                
                abstract public function calcDano(TipoPokemon $outro);
                abstract public function golpe();
                
            }
            
            class Fogo extends TipoPokemon{
                
                public function calcDano(TipoPokemon $outro){
                    if($outro instanceof Planta){
                        $fatorDano = 2;
                    }
                    if($outro instanceof Agua){
                        $fatorDano = 0.3;
                    }
                }
                
                public function golpe(){
                    echo "ATAQUE LANÇA-CHAMAS!!!!<br>";
                }
                
            }
            
            class Agua extends TipoPokemon implements Surfavel{
                
                public function calcDano(TipoPokemon $outro){
                    if($outro instanceof Planta){
                        $fatorDano = 0.4;
                    }
                    if($outro instanceof Fogo){
                        $fatorDano = 2.27;
                    }
                }
                
                public function golpe(){
                    echo "ATAQUE JATO D'AGUA!!!!<br>";
                }
                
                public function surfar(){
                    echo "SURFOU...<br>";
                }
            }
            
            class Planta extends TipoPokemon{
                
                public function calcDano(TipoPokemon $outro){
                    if($outro instanceof Fogo){
                        $fatorDano = 0.2;
                    }
                    if($outro instanceof Agua){
                        $fatorDano = 2.3;
                    }
                }
                
                public function golpe(){
                    echo "ATAQUE FOLHA NAVALHA!!!!<br>";
                }
            }
            
            class Pokemon2{
                private $hp, $atk, $tipo;
                
                public function __construct($hp, $atk, TipoPokemon $tipo){
                    $this->hp = $hp;
                    $this->atk = $atk;
                    $this->tipo = $tipo;
                }
                
                public function tomarDano($fator){
                    $this->hp = $this->hp - $fator;
                }
                
                public function atacar(Pokemon2 $inimigo){
                    $this->tipo->calcDano($inimigo->tipo);
                    $inimigo->tomarDano($this->tipo->getFatorDano()*$this->atk);
                    $this->tipo->golpe();
                    $inimigo->status();
                }
                
                public function status(){
                    echo "Hp: $this->hp";
                }
            }
            
            class Movimento{
                public function andarNaAgua(Surfavel $s){
                    $s->surfar();
                }
            }
            
            $p21 = new Pokemon2(250, 10, new Agua);
            $p22 = new Pokemon2(300, 20, new Fogo);
            $p21->atacar($p22);
            $m = new Movimento();
            $a = new Agua();
            $m->andarNaAgua($a);
            
//-------------------------------------------------------------------------------------------
//CLASSE EXEMPLIFICANDO UM POKEMON SEM O USO DE ABSTRACAO
            class Pokemon{
                
                private $hp, $atk, $tipo;
                
                public function __construct($hp, $atk, $tipo){
                    $this->hp = $hp;
                    $this->atk = $atk;
                    $this->tipo = $tipo;
                }
                
                public function superEfetivo($inimigo){
                    //TODAS AS COMBINACOES
                    if($this->tipo === "Fogo" &&
                       $inimigo->tipo === "Planta"){
                        $inimigo->hp = $inimigo->hp - (2*$this->atk); 
                        echo "ATAQUE LANÇA-CHAMAS!!!<br>";
                    }
                    if($this->tipo === "Eletrico" &&
                       $inimigo->tipo === "Agua"){
                        $inimigo->hp = $inimigo->hp - (2.5*$this->atk); 
                        echo "ATAQUE CHOQUE DO TROVAO!!!<br>";
                    }
                    if($this->tipo === "Agua" &&
                       $inimigo->tipo === "Fogo"){
                        $inimigo->hp = $inimigo->hp - (2.27*$this->atk); 
                        echo "ATAQUE JATO D'ÁGUA!! <br>";
                    }
                    echo $inimigo->hp;
                }
                
            }
            //$p = new Pokemon(500,100,"Agua");
            //$q = new Pokemon(1000,100,"Fogo");
            //$p->superEfetivo($q);
    ?>
</body>
