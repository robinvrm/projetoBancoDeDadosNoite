<?php include_once('../connection/CONNECTION.php'); ?>
<?php
class Users
{
  public static function getUsers($user, $password)
  {
    return CONNECTION::getResult("
      SELECT
        id,
        nome
      FROM
        tb_usuarios
      WHERE TRUE 
        AND login = '{$user}'
        AND senha = '{$password}'
    ");
  }

  public static function insertNewUser($nameUser, $cpfUser, $login, $password, $birthDateUser)
  {
    return CONNECTION::insert("
      INSERT INTO tb_usuarios
      (
        nome,
        cpf,
        login,
        senha,
        nascimento
      )
      VALUES
      (
        '{$nameUser}',
        '{$cpfUser}',
        '{$login}',
        '{$password}',
        '{$birthDateUser}'
      )
    ");
  }

  public static function hasUserRegister($cpfUser)
  {
    return CONNECTION::hasResult("
      SELECT
        id
      FROM
        tb_usuarios
      WHERE TRUE 
        AND cpf = '{$cpfUser}'
    ");
  }

  public static function getAllUsers()
  {
    return CONNECTION::getResults("
      SELECT
        *
      FROM
        tb_usuarios
      ORDER BY
        ativo DESC
    ");
  }

  public static function hasUserAtivo($userId)
  {
    return CONNECTION::hasResult("
      SELECT
        id
      FROM
        tb_usuarios
      WHERE TRUE 
        AND id = '{$userId}'
        AND ativo = 1
    ");
  }

  
  public static function desativarUser($userId)
  {
    return CONNECTION::update("
      UPDATE
        tb_usuarios
      SET
        ativo = '0'
      WHERE TRUE
        AND id = '{$userId}'
    ");
  }

  public static function ativarUser($userId)
  {
    return CONNECTION::update("
      UPDATE
      tb_usuarios
      SET
        ativo = '1'
      WHERE TRUE
        AND id = '{$userId}'
    ");
  }
}
?>