#WEB SERVICE
    
    Iremos trabalhar com JSON, ou seja, nossas urls serão basicamente:
**url.com/NomeResource/inserir** onde, NomeResource será o nome da classe e o inserir
sera o nome do método.
exemplo de json: `{"nome":"teste"}`

##HTACCESS

    Primeiro passo para fazermos um websevice no PHP é modificar o modo no qual o apache
efetua a leitura das urls. Efetuamos isso no arquivo de configuração HTACCESS.
    *Rewriteengine* é o comando que permite reescrever urls. Irá receber um **On**.
    *RewriteRule* configura a expressão regular (regex) das urls.
    Podemos ver como essa configuração irá ficar no arquivo **.htaccess** nessa pasta.

##MÉTODOS HTTP
    
    Dentro do padrão REST, temos metódos especificos para cada ação no servidor:
    
    **GET ->** Para consultar recursos no servidor, somente consultar.
    **POST ->** Para inserir recursos no servidor, somente inserir.
    **PUT ->** Para atualizar recursos no servidor, somente atualizar.
    **DELETE ->** Para apagar recursos no servidor, somente apagar.
    **OPTIONS ->** Verifica quais métodos são possiveis para um recurso no servidor.
    **HEAD ->** Funciona como o get, porém sem o bod  y no req/res.

##REQUEST E RESPONSE
    
    Ao efetuar uma comunicação HTTP é criado um arquivo de texto request no qual o servidor
irá receber, esse arquivo possui um **header** onde vai as especificações como `method:GET`
e o **body** no qual possui a **query string** e tudo que será enviado pelo emissor.
    No response, que é o arquivo de texto retornado pelo servidor após a chegada do request
teremos também um **header**, que normalmente vem com o **status code** e o **body**
retorna a página, ou então um json, etc..
    Podemos concluir que tanto o request como o response possuem um **header** e um **body**.
    

Vamos ao arquivo **web.php** e lá criaremos o nosso webservice de acordo com a linguagem
PHP.
    
