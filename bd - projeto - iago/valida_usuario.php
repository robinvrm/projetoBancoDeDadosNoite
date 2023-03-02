<?php
session_start();
include_once('bd_conexao.php');


    //Abaixo atribuímos os valores provenientes do formulário pelo método POST
    $nome = $_POST['nome']; 
    $login = $_POST['log'];
    $senha = $_POST['senha'];
    $data_nascimento = $_POST['data_nascimento'];
    

    $result_usuario = "INSERT INTO tb_usuarios (nome, log, senha, data_nascimento, data_criacao) VALUES ('$nome', '$login', '$senha', '$data_nascimento', NOW())";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_insert_id($conn)){
      $_SESSION['msg'] = "Usuário cadastrado com sucesso";
         header("location: cadastrar_usuario.php");
    } else {
      $_SESSION['msg'] = "Erro ao cadastrar usuário";
      header("location: cadastrar_usuario.php");
    }
   
    ?>