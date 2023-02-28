<?php include_once('../connection/CONNECTION.php'); ?>

<?php
class Categorias
{
  public static function getAllCategorias()
  {
    return CONNECTION::getResults("
      SELECT
        *
      FROM
        tb_categoria
      ORDER BY
        nome
    ");
  }

  public static function insertNewCategoria($nome)
  {
    return CONNECTION::insert("
      INSERT INTO tb_categoria
      (
        nome,
        ativo
      )
      VALUES
      (
        '{$nome}',
        '1'
      )
    ");
  }

  public static function hasCategoriaNome($nome)
  {
    return CONNECTION::hasResult("
      SELECT
        id
      FROM
        tb_categoria
      WHERE TRUE 
        AND nome = '{$nome}'
    ");
  }

  
  public static function hasCAtegoriaAtiva($categoriaId)
  {
    return CONNECTION::hasResult("
      SELECT
        id
      FROM
      tb_categoria
      WHERE TRUE 
        AND id = '{$categoriaId}'
        AND ativo = 1
    ");
  }

  
  public static function desativarCategoria($categoriaId)
  {
    return CONNECTION::update("
      UPDATE
      tb_categoria
      SET
        ativo = '0'
      WHERE TRUE
        AND id = '{$categoriaId}'
    ");
  }

  public static function ativarCategoria($categoriaId)
  {
    return CONNECTION::update("
      UPDATE
        tb_categoria
      SET
        ativo = '1'
      WHERE TRUE
        AND id = '{$categoriaId}'
    ");
  }
}

?>