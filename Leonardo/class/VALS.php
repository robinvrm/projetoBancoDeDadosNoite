<?php include_once('../connection/CONNECTION.php'); ?>
<?php
class VALS
{
  public static function postG($value)
  {
    return isset($_POST["$value"]) ? $_POST["$value"] : null;
  }

  public static function postS($value, $valueSet)
  {
    return ($_POST[$valueSet] = $value) ? true : false;
  }

  public static function getG($value)
  {
    return isset($_GET["$value"]) ? $_GET["$value"] : null;
  }

  public static function getS($value, $valueSet)
  {
    return ($_GET[$valueSet] = $value) ? true : false;
  }

  public static function sessionG($value)
  {
    return isset($_SESSION["$value"]) ? $_SESSION["$value"] : null;
  }

  public static function sessionS($value, $valueSet)
  {
    return ($_SESSION[$valueSet] = $value) ? true : false;
  }
}
?>