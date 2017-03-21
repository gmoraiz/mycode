<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="row main">
    <div class="medium-6 columns medium-centered">
        <form action="logar" method="post" id="login" data-abide>
            <div class="row collpase">
                <div class="medium-12 columns">
                    <label>Email:
                        <input type="email" name="email" required>
                    </label>
                    <small class="error">Email Inválido!</small>
                </div>
            </div>
            <div class="row collapse">
                <div class="medium-12 columns">
                    <label>Senha:
                        <input type="password" name="senha" required>
                    </label>
                    <small class="error">Coloque a sua senha!</small>
                </div>
            </div>
            <div class="row collapse">
                <div class="medium-12 columns">
                    <input type="submit" value="Logar" class="button radius secondary" id="btnLogin">
                </div>
            </div>
    </div>
</main>