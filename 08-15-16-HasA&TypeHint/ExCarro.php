<!-- Faça uma classe chamada Pneu
que possua um atributo de durabilidade
(um inteiro). A classe carro possui
uma marca e quatro Pneus como atributo.
Um carro pode acelerar se todos os Pneus
tiverem um valor de durabilidade acima
de 0. Cada vez que um carro acelera os
quatro Pneus perdem 10 pontos de durabilidade.
Faça quatro métodos de troca de Pneu,
um para cada posição. Os construtores das
classes também devem ser implementados
assim como os testes. -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Carro</title>
    </head>
    <body>
        <?php
            class Pneu{
                public $durabilidade;
                
                public function __construct($durabilidade){
                    $this->durabilidade = $durabilidade;
                }
                
                public function desgaste(){
                    $this->durabilidade -= 10;
                }
                
                public function estado(){
                    return $this->durabilidade > 0 ? true : false;
                }
                
            }
            
            class Carro{
                public $marca, $pneu1, $pneu2, $pneu3, $pneu4;
                
                public function __construct($marca, Pneu $pneu1, Pneu $pneu2, Pneu $pneu3, Pneu $pneu4){
                    $this->marca = $marca;
                    $this->pneu1 = $pneu1;
                    $this->pneu2 = $pneu2;
                    $this->pneu3 = $pneu3;
                    $this->pneu4 = $pneu4;
                }
                
                public function acelerar(){
                    if ($this->pneu1->estado() && $this->pneu2->estado() && $this->pneu3->estado() && $this->pneu4->estado()){
                        $this->pneu1->desgaste();
                        $this->pneu2->desgaste();
                        $this->pneu3->desgaste();
                        $this->pneu4->desgaste();
                        echo "<p> O $this->marca está Acelerando!!!</p>";
                    } else{
                        echo "<p>Os Pneus do $this->marca estão desgastados!!!</p>";
                    }
                }
                
                public function trocarPneu1(Pneu $p){
                    $this->pneu1 = $p;
                }
                
                public function trocarPneu2(Pneu $p){
                    $this->pneu2 = $p;
                }
                
                public function trocarPneu3(Pneu $p){
                    $this->pneu3 = $p;
                }
                
                public function trocarPneu4(Pneu $p){
                    $this->pneu4 = $p;
                }
            }
            
            $c1 = new Carro("Celta", new Pneu(30), new Pneu(30), new Pneu(30), new Pneu (30));
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
            $c1->trocarPneu1(new Pneu(50));
            $c1->trocarPneu2(new Pneu(50));
            $c1->trocarPneu3(new Pneu(50));
            $c1->trocarPneu4(new Pneu(50));
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
            $c1->acelerar();
        ?>
    </body>
</html>