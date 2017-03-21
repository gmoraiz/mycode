# MODEL E SESSION (CONTINUAÇÃO MVC)

    O CodeIgniter quebra o paradigma da orientação a objetos, temos que dar um "pelé" na framework
para escrever com técnicas da programação OO, como por exemplo: atributos privados e construtores.
    Iremos trabalhar nesta pasta utilizando as pastas *models *views* *controllers*.
    Para trabalharmos com atributos privados, devemos passar os atributos para um array associativo e depois
joga-lo no banco.

##EXERCICIO 1
    
    Vamos criar uma tabela disciplina contendo os campos: id, nome, descrição:
        - criar uma rota para mostrar o formulário
        - criar o model com os atributos privados
        - criar uma rota para inserção de disciplinas;
    Resposta: nos arquivos *views/formDisciplina*, *controllers/Disciplina*, *models/DisciplinaModel*

#SESSION
    
    A **session** fica do lado do servidor e o **cookie** do lado do cliente. A session é uma maneira de dar
memoria ao HTTP.
    Para inserirmos session, basta alterarmos o arquivo *config/autoload.php* incluindo 'session' no construtor
seguinte: -> `$autoload['libraries'] = array('database','session')`;