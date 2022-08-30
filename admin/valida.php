<?php
    session_start();
    // ncluido a conexão com o banco de dados
    include_once("conexao.php");
    // o campo usuario e senha preenchido entra no if para validar
    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $usuario = mysqli_real_escape_string($conn, $_POST['email']);
        // escapar de caracteres especiais,como aspas,prevenindo sql injection
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = md5($senha);

        // buscar na tabela usuario o usuario que corresponde com os dados digitados no formulário
        $result_usuario = "SELECT * FROM  usuarios WHERE email = 
        '$usuario' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn,$result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);

        // encontrado um usuario na tabela usuario com os mesmos dados digitados no formulario
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
            if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                header("location: administrativo.php");
            }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
                header("location: colaborador.php");
            }else{
                header("location: cliente.php");
            }
        // nao foi encontrado um usuario na tabela usuário com
        // os mesmos dados digitando no formuçário
        // redireciona o usuário para a página de login
        }else{
            // variavel global recebendo a mesagem de erro
            $_SESSION[`loginErro`] = "Usuario ou senha inválido";
            header("location: index.php");
        }
    }else{
        $_SESSION[`loginErro`] = "Usuario ou senha inválido";
        header("location: index.php");
    }


?>