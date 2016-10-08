<!-- Exemplo para mostrar a flexibilidade do polimorfismo no PHP.
     que no caso seria o Duck Type, que é o polimorfismo para linguagens
     de tipagens fraca. -->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Polimorfismo</title>
</head>
<body>
    <?php
        class Pato{
            public function nadar(){
                echo "Nadou como Pato";
            }
            public function voar(){
                echo "Voou como Pato";
            }
            public function grasnar(){
                echo "QUACK!!!!";
            }
        }
        
        class Humano{
            public function nadar(){
                echo "Nadou como humano";
            }
            public function voar(){
                echo "Voou como humano";
            }
            public function grasnar(){
                echo "IMITOU O PATO!!!!";
            }
        }
        
        class Floresta{
            public function acoes($p){
                $p->grasnar();
                $p->voar();
                $p->nadar();
            }
        }
        //NAO HA NECESSIDADE DE TER HERANCA NA PASSAGEM (TYPE-HINT)
        //BASTA QUE O OBJETO PASSADO TENHA OS METODOS QUE SERAO
        //EXECUTADOS.
        $f = new Floresta();
        $f->acoes(new Humano());
    ?>
</body>