<?php
session_start();
include_once('bd_conexao.php');


    //Abaixo atribuímos os valores provenientes do formulário pelo método POST
    $id = $_POST['id'];
    $nome = $_POST['nome']; 
    $login = $_POST['log'];
    $senha = $_POST['senha'];
    $data_nascimento = $_POST['data_nascimento'];
    

    $result_usuario = " UPDATE  tb_usuarios SET nome='$nome', log='$login', senha='$senha', data_nascimento='$data_nascimento', modificar= NOW() WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_affected_rows($conn)){
      $_SESSION['msg'] = "Usuário editado com sucesso";
         header("location: relatorio_usuario.php");
    } else {
      $_SESSION['msg'] = "Erro ao editar usuário";
      header("location: editar_usuario.php?id=$id");
    }
   
    ?>