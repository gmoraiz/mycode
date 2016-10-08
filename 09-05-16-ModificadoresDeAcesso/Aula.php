<!-- Indicação de leitura: Getters/Setters. Evil. Period. 
     Pesquisar também pelo artigo do mesmo autor sobre DTO.-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificadores de Acesso</title>
    </head>
    <body>
        <?php
            // Não é uma boa prática utilizar os Get e Set sem analisar a regra de negócio do sistema.
            // Eles são usados em poucos casos e não são para todos os atributos.
            // O set quase nunca deve ser usado, pois ele é uma violação ao estado da varíavel.
            class Pokemon{
                private  $hp, $ataque, $nome, $tipo;
                
                public function __construct($hp, $ataque, $nome, $tipo){
                    $this->hp = $hp;
                    $this->ataque = $ataque;
                    $this->nome = $nome;
                    $this->tipo = $tipo;
                }
                
                public function levelUp(){
                    $this->up += 20;
                    $this->ataque += 5;
                }
                
                public function mostrar(){
                    echo "<p>Nome: $this->nome</p>";
                    echo "<p>Tipo: $this->tipo</p>";
                    echo "<p>HP: $this->hp</p>";
                    echo "<p>Ataque: $this->ataque</p><hr>";
                }
                
                public function setAtaque($ataque){
                    $this->ataque = $ataque;
                }
                
                public function getAtaque(){
                    return $this->ataque;
                }
                
                public function setHp($hp){
                    $this->hp = $hp;
                }
                
                public function getHp($hp){
                    return $this->hp;
                }
                
                public function setNome($nome){
                    $this->nome = $nome;
                }
                
                public function getNome(){
                    return $this->nome;
                }
                
                public function setTipo($tipo){
                    $this->tipo = $tipo;
                }
                
                public function getTipo(){
                    return $this->tipo;
                }
            }
            //Buscando explicar a brutalidade do get e set, no qual aumenta o acoplamento.
            //A classe trainer foi criada para exemplificar o acesso aos atributos de uma classe atraves de outra.
            class Trainer{
                public function algumaCoisa(Pokemon $p){
                    $p->setAtaque(50);
                    $p->setTipo("Grama");
                    $p->setHp(100);
                }
            }
            //O pokemon errado está usando os atributos inviaveis set para colocar informações que vão
            //contra a regra de negócios do sistema.
            $pkmnCertinho = new Pokemon(200,50,"Pikachu","Eletrico");
            $pkmnCertinho->levelUp();
            $pkmnCertinho->mostrar();
            $pkmnErrado = new Pokemon(200,50,"Pikachu","Eletrico");
            $pkmnErrado->setHp(-90);
            $pkmnErrado->setAtaque(7000000);
            $pkmnErrado->setTipo("Ghost");
            $pkmnErrado->mostrar();
            $t = new Trainer();
            $t->algumaCoisa($pkmnErrado);
            $pkmnErrado->mostrar();
        ?>
    </body>
</html>