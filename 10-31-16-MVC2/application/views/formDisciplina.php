<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
    <body>
        <p>Cadastre a disciplina</p>
        <form action="postar" method="post">
            Nome:       <input type="text" name="nome">
            Disciplina: <textarea name="descricao"></textarea>
            <input type="submit">
        </form>
    </body>
</html>