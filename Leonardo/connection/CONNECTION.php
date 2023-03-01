<?php
class CONNECTION
{
  private static function getConnection($query)
  {
    $conexao = mysqli_connect('127.0.0.1', 'root', '', 'projeto_cadastro') or die('Não foi possível conectar');
    return $conexao->query($query);
  }

  private static function getArray($resultQuery)
  {
    $linhasRetornadas = mysqli_num_rows($resultQuery);
    $arrayResult = [];

    if ($linhasRetornadas) {
      while ($itens = mysqli_fetch_assoc($resultQuery)) {
        array_push($arrayResult, $itens);
      }
    } else {
      return false;
    }

    return $arrayResult;
  }

  public static function getResults($query)
  {
    $resultQuery = self::getConnection($query);

    $arrayResult = self::getArray($resultQuery);

    return $arrayResult;
  }

  public static function getResult($query)
  {
    $resultQuery = self::getConnection($query);

    if ($resultQuery) {
      if ($result = mysqli_fetch_assoc($resultQuery)) {
        return $result;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public static function insert($query)
  {
    return self::getConnection($query);
  }

  public static function hasResult($query)
  {
    $resultQuery = self::getResult($query);

    if ($resultQuery) {
      return true;
    } else {
      return false;
    }
  }

  public static function update($query)
  {
    return self::getConnection($query);
  }

  public static function getAttr($attribute, $query)
  {
    $resultQuery = self::getConnection($query);

    if ($resultQuery) {
      if ($row = mysqli_fetch_assoc($resultQuery)) {
        if (isset($row["{$attribute}"])) {
          return $row["{$attribute}"];
        } else {
          return false;
        }
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
