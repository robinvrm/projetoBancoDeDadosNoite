<?php 
session_start();
include_once('bd_conexao.php');
$id = filter_input(INPUT_GET, 'id');
$result_usuario = "SELECT * FROM tb_usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="valida_edita_usuario.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id'];?>">

        <input name="nome" type="nome" placeholder="nome" value="<?php echo
        $row_usuario['nome'];?>">
        <input name="log" type="login" placeholder="login" value="<?php echo
        $row_usuario['log'];?>">
        <input name="senha" type="password" placeholder="senha" value="<?php echo
        $row_usuario['senha'];?>">
        <input name="data_nascimento" type="date" placeholder="data nascimento" value="<?php echo
        $row_usuario['data_nascimento'];?>">        
        <button type="submit">Editar</button>
    </form>
        
</body>
</html>