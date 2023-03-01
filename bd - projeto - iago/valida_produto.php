<?php
session_start();
include_once('bd_conexao.php');


    //Abaixo atribuímos os valores provenientes do formulário pelo método POST
    $nome_produto = $_POST['nome_produto']; 
    $categoria = $_POST['categoria'];
    
    $result_cadastro = "INSERT INTO tb_produtos (nome_produto, categoria) VALUES ('$nome_produto', '$categoria')";
    $resultado_usuario = mysqli_query($conn, $result_cadastro);

    if (mysqli_insert_id($conn)){
      $_SESSION['msg'] = "Produto cadastrado com sucesso";
         header("location: cadastrar_produto.php");
    } else {
      $_SESSION['msg'] = "Produto cadastrado com sucesso";
      header("location: cadastrar_produto.php");
    }
   
    ?>