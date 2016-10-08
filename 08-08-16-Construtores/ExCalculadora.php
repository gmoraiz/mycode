<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Calculadora</title>
</head>
<body>
    <?php
        class Calculadora{
            public $num1, $num2;
            
            public function __construct($num1, $num2){
                $this->num1 = $num1;
                $this->num2 = $num2;
            }
            
            public function __call($m, $args){
                echo "<p>Erro! a operação ".$m." É inválida.</p>";
            }
            
            public function somar(){
                return $this->num1 + $this->num2;
            }
            
            public function subtrair(){
                return  $this->num1 - $this->num2;
            }
            
            public function multiplicar(){
                return $this->num1 * $this->num2;
            }
            
            public function dividir(){
                return $this->num2 == 0 ? "Não existe divisão por 0" : $this->num1 / $this->num2;
            }
        }
        $calc = new Calculadora($_GET['num1'], $_GET['num2']);
        echo "<p>O resultado da conta é: " . $calc->$_GET['operacao']() . "</p>";
    ?>
</body>