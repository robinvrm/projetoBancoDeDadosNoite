<?php
session_start();
include_once('bd_conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE FROM tb_usuarios WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
  if (mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "Usuário deletado com sucesso";
       header("location: relatorio_usuario.php");
  } else {
    $_SESSION['msg'] = "Erro ao deletar usuário";
    header("location: editar_usuario.php?id=$id");
  }
}


    ?>