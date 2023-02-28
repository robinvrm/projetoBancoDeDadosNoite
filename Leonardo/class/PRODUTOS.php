<?php include_once('../connection/CONNECTION.php'); ?>

<?php
class Produtos
{
  public static function getAllProdutos()
  {
    return CONNECTION::getResults("
      SELECT
        tb_produto.id,
        tb_produto.fk_usuario,
        tb_produto.nome,
        tb_produto.fk_categoria,
        tb_produto.created_at,
        tb_produto.ativo,
        tb_categoria.nome AS nome_categoria
      FROM
        tb_produto
        INNER JOIN tb_categoria ON tb_categoria.id = tb_produto.fk_categoria
      GROUP BY
        tb_produto.fk_categoria
      ORDER BY
        tb_produto.ativo
    ");
  }

  public static function insertNewProduto($usuarioId, $categoriaId, $nome)
  {
    return CONNECTION::insert("
      INSERT INTO tb_produto
      (
        fk_usuario,
        fk_categoria,
        nome,
        ativo
      )
      VALUES
      (
        '{$usuarioId}',
        '{$categoriaId}',
        '{$nome}',
        '1'
      )
    ");
  }

  public static function hasProdutoNome($nome)
  {
    return CONNECTION::hasResult("
      SELECT
        id
      FROM
        tb_produto
      WHERE TRUE 
        AND nome = '{$nome}'
    ");
  }


  public static function hasProdutoAtivo($produtoId)
  {
    return CONNECTION::hasResult("
      SELECT
        id
      FROM
        tb_produto
      WHERE TRUE 
        AND id = '{$produtoId}'
        AND ativo = 1
    ");
  }


  public static function desativarProduto($usuarioId, $produtoId)
  {
    $dataAtual = date('Y-m-d H:i:s');

    return CONNECTION::update("
      UPDATE
        tb_produto
      SET
        ativo = '0',
        deleted_at = '{$dataAtual}',
        fk_usuario_del = '{$usuarioId}'
      WHERE TRUE
        AND id = '{$produtoId}'
    ");
  }

  public static function ativarProduto($produtoId)
  {
    return CONNECTION::update("
      UPDATE
        tb_produto
      SET
        ativo = '1'
      WHERE TRUE
        AND id = '{$produtoId}'
    ");
  }
}
?>