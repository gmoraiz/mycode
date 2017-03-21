#MODEL-VOEW-CONTROLLER (MVC)

    Padrão de projeto de software que visa separar uma interface com o usuário
dos dados. Muito requisitado no mercado e nos bons códigos web.
    O padrão é dividido 3 camadas:
    
    **Model**: Camada que trata os dados. Representa o estado da aplicação.
Aqui há rotinas de interface com o banco de dados.
    **View**: Camada de apresentação. Aqui estão as páginas HTML. Esta camada
pode observar mudanças de estado do model.
    **Controller**: Responsável por ler as requisições HTTP e a partir delas,
delegar ações p/ view do model.
    
    Iremos usar framework para generalizar e facilitar o trabalho com o MVC no
PHP. A framework será o CodeIgniter. Para verificar como funciona a configuração
entre no arquivo *configuracoes.txt*
    Escrevemos a seguinte linha *defined('BASEPATH') OR exit('No direct script access allowed');*
para não permitir que rotas que não sejam definidas sejam inacessiveis.
    Para configurar rotas vamos no arquivo *application/config/routes.php*

##EXERCICIO 1
    Crie um formulario para somar dois numeros. O acesso deve ser feito pela URL.
    app.com/index.php/math/formulario
    E a soma deve ser efetuada em app.com/index.php/math/formulario/somar
    
    R: controller **Math** e views **conta** e **resultadoConta**.
    
#INTERPOLACAO

    **<?= ?>** é uma interpolação que gera um echo.

#CONEXAO COM O BANCO.
    
    Para efetuar a conexão no codeigniter, precisamos alterar o arquivo *application/config/database.php*
e o arquivo *application/config/autoload.php* alterando a linha *$autoload['libraries'] = array();*
inserindo o valor **database** no construtor, ou seja, *$autoload['libraries'] = array('database');*

##EXERCICIO 2

    Efetuar um cadastro apartir de três dados enviando por formulario, sendo, nome, idade
e cpf. Inserir esses três registros no banco, usando o modelo MVC.

    