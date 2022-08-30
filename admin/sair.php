<?php
    session_start();

    unset(
        $_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['usuarioNivelAcessoId'],
        $_SESSION['usuarioEmail'],
        $_SESSION['usuarioSenha']
    );

    $_SESSION['logindesloga'] = "Deslogado com sucesso";
    // redirecionar o usuario para a página de login
    header("location: index.php")
?>