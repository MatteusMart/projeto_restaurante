<?php 

include('../includes/conexao.php');



session_start();
echo "usuario".$_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){
    header("location: index.php");
    $_SESSION[`loginErro`] = "Você não efetuou o login";
}

?>

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
  <div class="row centered-form">
    <div class="col-lg-12 ">
      <p><a href="index.php">Add New Record</a></p>
    <div class="panel panel-default">

      <div class="panel-heading">
        <h3 class="panel-title">CRUD Operation Using PHP PDO</h3> </div>
      <div class="panel-body">

      <?php

      $query = "SELECT * from tb_reserva";
      $res = mysqli_query($conexao,$query);

      // conta o numero de registros
      $total = mysqli_num_rows($res);

      ?>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Data reseva</th>
            <th>Mensagem</th>
            <th>Numero pessoas</th>
            
          </tr>
        </thead>
        <tbody>
          <?php while($dados=mysqli_fetch_array($res)): $id = $dados['id'] ?>
          <tr>
            <td><?php echo $dados ['id'] ?></td>
            <td><?php echo $dados ['nome'] ?></td>
            <td><?php echo $dados ['telefone'] ?></td>
            <td><?php echo $dados ['email'] ?></td>
            <td><?php echo $dados ['data_reserva'] ?></td>
            <td><?php echo $dados ['mensagem'] ?></td>
            <td><?php echo $dados ['numero_pessoas'] ?></td>
            <td><button><a href="editar-reserva.php?idreserva=<?= $dados['id']?>">Alterar</button></a></td>
            <td><button><a href="deletar-reserva.php?idreserva=<?= $dados['id']?>">Excluir</button></a></td>
          </tr> 
          <?php endwhile ?> 
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

<style type="text/css">

body {
  background-color: #fff;
}

.centered-form {
  margin-top: 60px;
}

.centered-form .panel {
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}

</style>