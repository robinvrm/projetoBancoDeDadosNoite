<?php include_once('bd_conexao.php'); ?>
<?php
$conexsql = "select * from tb_usuarios";

$res = $conn->query($conexsql);
var_dump($res);
$login = $_POST['log'];
$senha = $_POST['senha'];

foreach ($res as $usuario) {
    
    if ($login == $usuario['log'] && $senha == $usuario['senha']) {
        // $_SESSION["usuario"] = $usuario['nome'];
        header(header: 'Location:' . 'menu.php');
        break;
    } elseif  ($login != $usuario['log'] || $senha != $usuario['senha']) {       
        header(header: 'Location:login.php');
        // echo "Login ou senha inválido, tente novamente!";
    }

}