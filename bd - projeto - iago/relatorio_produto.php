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
    <title>Relatório de Produto</title>
</head>
<body>
    <h1>Relatório de Produto</h1>
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

    $result_produtos = "SELECT * FROM tb_produtos WHERE ativo = 1 LIMIT $inicio, $qnt_result_pg";
    $resultado_produtos = mysqli_query($conn, $result_produtos);
    while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){
        echo "Nome_produto: " . $row_produto['nome_produto'] . "<br>";
        echo "categoria: " . $row_produto['categoria'] . "<br>";
       
        echo "<a href='editar_produto.php?id=" . $row_produto['id'] . "'>Editar</a><br>" . "<br>";
        echo "<a href='deletar_produto.php?id=" . $row_produto['id'] . "'>Deletar</a>" . "<br>" . "<hr>";

    }
    //Paginação - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id) AS num_result FROM tb_produtos";
    $resultado_pg = mysqli_query($conn, $result_pg) ;
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    // echo $row_pg['num_result'];
    //Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os link antes depois
    $max_links = 2;
    echo "<a href='relatorio_produto.php?pagina=1'>Primeira</a>";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
        if($pag_ant >=1){
            echo "<a href='relatorio_produto.php?pagina=$pag_ant'>$pag_ant </a>";
        }
        
    }
    echo "$pagina";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
        if($pag_dep <= $quantidade_pg){
            echo "<a href='relatorio_produto.php?pagina=$pag_dep'>$pag_dep </a>";
        }
        
    }

    echo "<a href='relatorio_produto.php?pagina=$quantidade_pg'>Ultima</a>";
    ?>
</body>
</html>