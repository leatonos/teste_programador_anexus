<?php

require('config_db.php');

mysqli_set_charset($conn,"utf8");

/* Gerador de Código promocional */
    $codigo_promo = "";
    $letras = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $tamanho = 5;

    for ($i = 0; $i < $tamanho; $i++) {
        $codigo_promo .= $letras[rand(0, 61)];
    }

/* Campos do formulario */
    $nome_usuario = $_POST['login_acesso'];
    $senha_usuario = $_POST['senha_criada'];
    $codigo_utilizado = $_POST['codigo_utilizado'];

/* Query do Banco de dados */
    mysqli_query($conn, " INSERT INTO `usuarios_arvore` (`id`, `nome_usuario`, `senha_usuario`, `lista_indicados`, `codigo_promo`, `codigo_utilizado`) 
    VALUES (NULL, '$nome_usuario', '$senha_usuario','', '$codigo_promo', '$codigo_utilizado')");

/* Adicionar pontos caso tenha um código */


?>