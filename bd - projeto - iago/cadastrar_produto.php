<?php 
session_start();
include_once('bd_conexao.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="valida_produto.php" method="POST">
        <input name="nome_produto" type="name" placeholder="nome produto">
        <input name="categoria" type="name" placeholder="categoria">             
        <button type="submit">Enviar</button>
    </form>
        
</body>
</html>