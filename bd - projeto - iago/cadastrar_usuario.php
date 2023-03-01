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
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="valida_usuario.php" method="POST">
        <input name="nome" type="nome" placeholder="nome">
        <input name="log" type="login" placeholder="login">
        <input name="senha" type="password" placeholder="senha">
        <input name="data_nascimento" type="date" placeholder="data nascimento">        
        <button type="submit">Enviar</button>
    </form>
        
</body>
</html>