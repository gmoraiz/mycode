<!-- Faca uma classe Quadrilatero que contenha um atributo
lado1. Sabe-se que Quadrados e Retangulos sao Quadrilateros.
É possível calcular área e perímetro de ambos Quadriláteros.

AreaQuadrado = lado1*lado1
PerimQuadrado = 4*lado1
AreaRet = lado1*lado2
PerimRet = 2*(lado1+lado2) -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quadrilatero</title>
    </head>
    <body>
        <?php
            class Quadrilatero{
                protected $lado1;
                
                public function __construct($lado1){
                    $this->lado1 = $lado1;
                }
            }
            
            class Quadrado extends Quadrilatero{
                
                public function __construct($lado1){
                    parent::__construct($lado1);
                }
                
                public function areaQuadrado(){
                    return $this->lado1 * $this->lado1;
                }
                
                public function perimetroQuadrado(){
                    return $this->lado1 * 4;
                }
            }
             
            class Retangulo extends Quadrilatero{
                private $lado2;
                
                public function __construct($lado1, $lado2){
                    $this->lado2 = $lado2;
                    parent::__construct($lado1);
                }
                
                public function areaRetangulo(){
                    return $this->lado1 * $this->lado2;
                }
                
                public function perimetroRetangulo(){
                    return 2* ($this->lado1 + $this->lado2);
                }
            }
            
            $q = new Quadrado(5);
            echo "<p>Area Quadrado: ".$q->areaQuadrado()."</p>";
            echo "<p>Perimetro Quadrado: ".$q->perimetroQuadrado()."</p>";
            $p = new Retangulo(5,2);
            echo "<p>Area Retangulo: ".$p->areaRetangulo()."</p>";
            echo "<p>Perimetro Retangulo: ".$p->perimetroRetangulo()."</p>";
        ?>
    </body>
</html>