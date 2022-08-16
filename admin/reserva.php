<?php
    include('../includes/conexao.php');


    
        $nome     = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email    = $_POST['email'];
        $datar    = $_POST['data_reserva'];
        $mens     = $_POST['mensagem'];
        $npessoa  = $_POST['numero_pessoas'];


        $sql = "INSERT INTO tb_reserva(nome,
            telefone,
            email,
            data_reserva,
            mensagem,
            numero_pessoas
            )
            values(
            '$nome',
            '$telefone',
            '$email',
            '$datar',
            '$mens',
            '$npessoa'
            )";

    $conexao->query($sql);

    $conexao->close();
?>