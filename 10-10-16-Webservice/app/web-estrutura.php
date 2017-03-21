<!-- ESSE ARQUIVO FOI O PRIMEIRO EXEMPLO E NÃO ESTÁ SENDO UTILIZADO
ELE É SOMENTE UM EXEMPLO ESTRUTURADO PARA ENTENDER CADA INSTRUÇÃO. 
O WEB.PHP POSSUI O SERVER CONFIGURADO DENTRO DO PARADIGMA ORIENTADO A OBJETOS-->
<?php
    //Recuperando o metódo para verifica-lo nos if's da vida.
    $a = $_SERVER["REQUEST_METHOD"];
    
    if ($a === "OPTIONS"){
        header('Allow: OPTIONS, GET'); //VAI NO RESPONSE HEADER
    }
    
    if ($a === "POST"){
        //Para ler um json usamos o file_get_contents() abaixo
        $json = file_get_contents('php://input');
        
        //O json_decode transforma json em objeto.
        $obj = json_decode($json);
        
        //Conexão ao banco de dados
        //o die é uma exceção do php no qual mata a conexão com o banco.
        $conn = mysqli_connect("127.0.0.1", "gmoraiz", "", "db_webservice", 3306) or die("1".mysql_error());
        
        //Prepare prepara a query evita o uso das aspas e etc.. Evitando assim ataques de injeção sql
        $stmt = $conn->prepare("INSERT INTO tb_teste(nm_login) VALUES(?)") or die("2".$conn->error);
        
        //Agora setamos o parametro
        $stmt->bind_param("s",$obj->nome) or die("3".$stmt->error);
        
        //Agora a execução do comando é feita
        $stmt->execute() or die("4".$stmt->error);
    }
    
    if($a === "GET"){
        $conn = mysqli_connect("127.0.0.1", "gmoraiz", "", "db_webservice", 3306) or die("1".mysql_error());
        
        //preparar o select
        $st = $conn->prepare("SELECT * FROM tb_teste") or die("5".$conn->error);
        
        //executar
        $st->execute() or die("5".$st->error);
        
        //resultado com as duas colunas
        $st->bind_result($col0,$col1);
        
        //estrutura de repetição para exibir todo mundo
        while ($st->fetch()) {
            printf("%s %s\n", $col0, $col1);
        }
        
        echo "Ok!";
    }
?>