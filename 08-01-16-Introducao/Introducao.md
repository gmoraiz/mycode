#Introdução ao PHP e Orientação a Objetos (OO)

  Olá, bom dia, boa tarde, boa noite. Tudo bem com você aí? Enfim, sou aluno da Faculdade de Tecnologia Rubens Lara (FATEC-SANTOS)
e curso o Tecnólogo em Sistemas para Internet. E a partir do aprendizado através da materia denominada "Desenvolvimento de Servidores I",
abordada pelo Mestre Alexandre Garcia, inteligente demais, irei disponibilizar este conteúdo. (acredite, é rico!)

##Conceitos Básicos de OO

###Classe

  A famosa classe, inclusive, chegue na sua "crush" e diga: você não é orientada a objetos, mas é cheia de classe. Ok, Gabriel!
  Classe é onde se define **comportamentos** e **caracteristicas** dos **objetos**. Computacionalmente falando, ela é representada por
um programa, um arquivo. Ela é o local onde será feita a abstração e transcrição da realidade para o código.
  
###Objeto

  É uma instância da classe. Ele possui as caracteristicas e comportamentos definidos em uma classe. Computacionalmente, é um endereço
na memóra, criado com as especificações da classe. Ou seja, o objeto é uma moldagem concretizada a partir das especificações da classe.
Não se esqueça disso: O objeto irá para a memória RAM na hora da execução, mas a classe não!

###Atributos

  São as caracteristicas do objeto definidos na classe. Variáveis ou constantes que ficarão alocadas na memória
dominando um endereço e espaço qualquer. Exemplo: A classe *cachorro* que possui atributo *nome*.

###Métodos
  
  São comportamentos (ações) dos objetos definidos na classe. Seguindo o exemplo do cachorro, além do nome ele possuirá comportamentos,
como por exemplo *latir*.

###Estado

  É o valor assumido pelo atributo. Ora? Qual será o nome do cachorro? Se ele ainda não foi definido, será *vazio*, claro? E ao declarar
um nome como por exemplo "Cachorrão"? O valor assumido por esse endereço na memória será "Cachorrão". Este tipo de abordagem na
orientação a objetos é conhecido como o estado mutável, ou seja, um local na memória no qual sofre alterações de estado. Há uma grande
filosofia por trás do estado mutável e imutável, alias, o paradigma funcional de programação preza o estado imutável.

##PHP

  Quero começar dizendo que se você pretende seguir o aprendizado nesta linguagem: BUSQUE NÃO FAZER GAMBIARRAS, pois ela te atrairá
a isso. E eu posso te dizer que se você fizer um péssimo código em sua aplicação será comprometida. É melhor seguir o caminho mais
difícil!
  PHP é uma linguagem de script open-source usada no desenvolvimento web. Famosa pela sua praticidade de escrita e tempo de aprendizagem.
Mas lembre-se, não se atraia por isso, faça códigos demorados! Ela é de tipagem fraca e dinamica (recomendo [este link](http://pt.stackoverflow.com/questions/21508/qual-a-diferen%C3%A7a-entre-uma-linguagem-de-programa%C3%A7%C3%A3o-est%C3%A1tica-e-din%C3%A2mica "Tipagem"))
para você saber mais sobre o que é uma tipagem fraca e dinamica.
  
###Variável $this

  Significa que o objeto chamador é atribuido a esta variável. E em uma classe, qualquer membro deve ser referido pelo **$this**. O **$this**
faz referência ao objeto instanciado.
  Seguindo o exemplo do cachorro: `$this->nome`, `$this->latir($argumentos)`.

  Como você pode perceber acima, no php usamos o "->" para visualizar/usar os atributos e metodos de um objeto.
  E o **$** é uma estratégia da linguagem, no qual o interpretador, ao chegar no $, irá identificar que aquilo é uma váriavel. Ou seja,
toda variável irá ter o **$**, e se você estiver usando o **$this** e for acessar um atributo de um objeto, não irá precisar do **$** novamente.

Agora vamos a um exemplo prático? Nesta pasta, teremos um código *Revolver.php*. Vamos programar um revolver com estes conceitos!


