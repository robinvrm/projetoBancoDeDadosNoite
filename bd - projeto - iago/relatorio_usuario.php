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
    <title>Relatório de Usuário</title>
</head>
<body>
    <h1>Relatório de Usuário</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    // Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);    
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    //Setar a quantidade de itens por página
    $qnt_result_pg = 5;

    //Calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $result_usuarios = "SELECT * FROM tb_usuarios WHERE ativo = 1 LIMIT $inicio, $qnt_result_pg";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "Nome: " . $row_usuario['nome'] . "<br>";
        echo "Log: " . $row_usuario['log'] . "<br>";
        echo "Senha: " . $row_usuario['senha'] . "<br>";
        echo "Data de nascimento: " . $row_usuario['data_nascimento'] . "<br>" . "<br>" ;
        echo "<a href='editar_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>" . "<br>";
        echo "<a href='deletar_usuario.php?id=" . $row_usuario['id'] . "'>Deletar</a>" . "<br>" . "<hr>";

    }
    //Paginação - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id) AS num_result FROM tb_usuarios";
    $resultado_pg = mysqli_query($conn, $result_pg) ;
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    // echo $row_pg['num_result'];
    //Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os link antes depois
    $max_links = 2;
    echo "<a href='relatorio_usuario.php?pagina=1'>Primeira</a>";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
        if($pag_ant >=1){
            echo "<a href='relatorio_usuario.php?pagina=$pag_ant'>$pag_ant </a>";
        }
        
    }
    echo "$pagina";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
        if($pag_dep <= $quantidade_pg){
            echo "<a href='relatorio_usuario.php?pagina=$pag_dep'>$pag_dep </a>";
        }
        
    }

    echo "<a href='relatorio_usuario.php?pagina=$quantidade_pg'>Ultima</a>";
    ?>
</body>
</html>