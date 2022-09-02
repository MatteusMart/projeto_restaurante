<?php

    session_start();
    echo "usuario".$_SESSION['usuarioNome'];

    if($_SESSION['usuarioNome'] == ""){
        header("location: index.php");
        $_SESSION[`loginErro`] = "Você não efetuou o login";
    }

?>
<br>
<a href="sair.php">Sair</a>