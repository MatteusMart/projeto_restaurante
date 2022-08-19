<?php

require_once('../includes/conexao.php');

$id         = $_GET['idreserva'];
$nome       = $_POST['nome'];
$telefone   = $_POST['telefone'];
$email      = $_POST['email'];
$dreserva   = $_POST['dreserva'];
$mens       = $_POST['mensagem'];
$npessoas   = $_POST['npessoas'];

$sql =  "UPDATE tb_reserva set nome = '$nome', telefone = '$telefone', email = '$email', data_reserva = '$dreserva', mensagem = '$mens', numero_pessoas = '$npessoas' WHERE id = $id";

$conexao->query($sql);

$conexao->close();

header("Location: listar-reservas.php");