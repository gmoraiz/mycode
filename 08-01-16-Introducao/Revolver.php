<!DOTCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Revólver</title>
  </head>
  <body>
    <!-- Para delimitar a área de escrita PHP no qual será interpretada usa-se o "<?php" no inicio e "?>" no fim. -->
    <?php
      //para definir a classe usamos simplesmente o class. Lembre-se, comece-se sempre o nome das classes com letra maiúscula.
      class Revolver{
      //O que um revolver precisa? É bom sempre antes de começar a programar, desenvolver a modelagem a partir do diagrama de classes. Se você não sabe, busque saber como funciona, é de extrema importancia na orientação a objetos!
      //Precisa de dois atributos, sendo a quantidade de munição máxima e atual.
      //Vamos fazer os nossos primeiros atributos. Não se preocupe em saber o que é "public" no momento.
      public $qtdmax, $qtdatual;
      //Bom, um revolver também precisa atirar, carregar e exibir a quantidade de munição, certo?
      //Para isso, vamos criar os nossos primeiros métodos.
      public function atirar(){
        if(qtdatual != 0){
          //Caso a munição atual não seja zero, bora subtrair uma munição. Afinal, quando atiramos, uma bala sai da arma, certo?
          $this->qtdatual--;
        } else {
          //Caso contrário, opa, bora exibir a mensagem.
          echo "Sem munição";
        }
      }
      
      public function carregar(){
        //Para carregar, iremos usar uma lógica simples. Supondo que temos uma ak-47 e a quantidade máxima de munição é 30, ela tendo 12 balas no momento, concorda que para carregar é só somar a quantidade atual com a quantidade maxima subtraida por quantidade atual? Exemplo 30-12 = 18. Ok? 18 + 12 = 30. OOOH, pronto, vamos fazer isso.
        $this->qtdatual += $this->qtdmax - $this->qtdatual;
      }
      
      public funtion exibirMunicao(){
        //Aqui é só exibição, certo? Para concatenação, usamos o ".".
        echo $this->qtdmax . "/" . $this->qtdatual;
      }
      
      //Agora vamos usar nossa arma? A classe está feita, ok? Só que ela ainda não foi usada, o objeto não foi feito e não existe arma na memoria ):
      //Vamos fazer a primeira instância usando o operador new.
      $revolver = new Revolver();
      //Antes do = temos a referência, depois o objeto. Não confunda! a variável revolver possui o primeito byte do objeto que localiza o endereço do objeto na memória. Ou seja, com essa variavel, temos contato com o tal objeto instanciado a partir do new.
      //Opa, ok, agora vamos definir as munições, meter bala, carregar e exibir. Fazer tudo que nossos metodos oferecem.
      $revolver->qtdatual = 30;
      $revolver->qtdmax = 30;
      $revolver->atirar();
      $revolver->exibirMunicao();
      $revolver->carregar();
      $revolver->exibirMunicao();
    ?>
    <!-- Bom, aqui finalizamos a introdução. Não pare por aqui, há muito conteúdo. Busque também na internet, estude em fontes confiaveis. Até mais sz. -->
  </body>
</html>
