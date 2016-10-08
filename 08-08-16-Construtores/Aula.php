<!DOCTYPE html>
<head>
    <title>Construtores</title>
</head>
<body>
    <?php
        class Cachorro{
            public $nome, $raca;
            
            public function __construct($nome, $raca){
                $this->nome = $nome;
                $this->raca = $raca;
            }
            
            public function latir(){
                echo "<p> $this->nome : Au Au! </p>";
            }
            public function mostrarRaca(){
                echo "<p> $this->raca </p>";
            }
        }

        $c1 = new Cachorro($_GET["nome"], $_GET["raca"]);
        $c1->latir();
        $c1->mostrarRaca();
    ?>
</body>