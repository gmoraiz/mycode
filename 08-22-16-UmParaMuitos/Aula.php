<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokemon</title>
        <style>
            td{
                border:1px solid #000;
            }
        </style>
    </head>
    <body>
        <table>
            <td>Pokemon</td>
            <td>Numero</td>
            <td>Tipo</td>
        </table>
        <?php
            class Pokemon{
                public $nome, $tipo, $numero;
                
                public function __construct($nome, $tipo, $numero){
                    $this->nome = $nome;
                    $this->tipo = $tipo;
                    $this->numero = $numero;
                }
                
                public function status(){
                    echo "<script>
                              var table = document.querySelector('table');
                              var tr = document.createElement('tr');
                              var td1 = document.createElement('td');
                              var td2 = document.createElement('td');
                              var td3 = document.createElement('td');
                              td1.innerHTML='$this->nome';
                              td2.innerHTML='$this->numero';
                              td3.innerHTML='$this->tipo';
                              tr.appendChild(td1);
                              tr.appendChild(td2);
                              tr.appendChild(td3);
                              table.appendChild(tr);
                         </script>";
                }
            }
            
            class Trainer{
                public $nome, $pokeBag;
                
                public function __construct($nome){
                    $this->nome = $nome;
                    $this->pokeBag = array();
                }
                
                public function capturar(Pokemon $p){
                    foreach($this->pokeBag as $pokebola){
                        if($pokebola->pokemon == null){
                            $pokebola->guardarPokemon($p);
                            break;
                        }
                    }
                }
                
                public function listarPokemons(){
                    foreach($this->pokeBag as $pokebola){
                        if($pokebola->pokemon != null){
                            $pokebola->pokemon->status();
                        }
                    }
                }
                
                public function adquirirPokebola(){
                    $this->pokeBag[] = new Pokebola();
                }
                
                public function pokebolasVazias(){
                    $total;
                    foreach($this->pokeBag as $pokebola){
                        if($pokebola->pokemon == null)
                            $total++;
                    }
                    return $total == null ? "Nenhuma" : $total;
                }
            }
            
            class Pokebola{
                public $pokemon;
                
                public function guardarPokemon(Pokemon $pokemon){
                    $this->pokemon = $pokemon;
                }
            }
            
            $t = new Trainer("Gabriel");
            $t->adquirirPokebola();
            $t->adquirirPokebola();
            $t->adquirirPokebola();
            $t->capturar(new Pokemon("Mewtwo","psyco",200));
            $t->capturar(new Pokemon("Pinsir","Bug",133));
            $t->capturar(new Pokemon("Pinsir","Bug",133));
            $t->listarPokemons();
            echo "<p>Pokebolas vazias: " . $t->pokebolasVazias() . "</p>";
        ?>
    </body>
</html>