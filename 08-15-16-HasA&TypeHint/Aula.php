<!DOCTYPE html>
<html>
    <head>
        <title>Has-A</title>
    </head>
    <body>
        <?php
            class Endereco{
                public $logradouro, $bairro, $cidade;
                
                public function __construct($logradouro, $bairro, $cidade){
                    $this->logradouro = $logradouro;
                    $this->bairro = $bairro;
                    $this->cidade = $cidade;
                }
                public function mostrarDados(){
                    echo "<p>Logradouro: $this->logradouro</p>";
                    echo "<p>Bairro: $this->bairro</p>";
                    echo "<p>Cidade: $this->cidade</p>";
                }
            }
            
            class Aluno{
                public $nome, $endereco;
                
            //COM INJEÇÃO DE DEPENDENCIA
                /*public function __construct($nome, $endereco){
                    $this->nome = $nome;
                    $this->endereco = $endereco;
                }*/
            //SEM INJEÇÃO DE DEPENDENCIA
                public function __construct($nome, $logradouro, $bairro, $cidade){
                    $this->nome = $nome;
                    $this->endereco = new Endereco ($logradouro, $bairro, $cidade);
                }
            }
            
        //COM INJEÇÃO DE DEPENDENCIA
          //$a = new Aluno("Gabriel Morais Silva", new Endereco("Rua XV", "ABC", "FOO"));
            
        //SEM INJEÇÃO DE DEPENDENCIA
            $a = new Aluno("Gabriel Morais Silva", "Rua XV", "ABC", "FOO");
            $a->endereco->mostrarDados();
        ?>
    </body>
</html>