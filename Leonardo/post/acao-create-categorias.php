<?php require_once('../start/class.php'); ?>

<?php
$nameCategoria = strtoupper(addslashes(VALS::postG('nameCategoria')));

if (Categorias::hasCategoriaNome($nameCategoria)) {
  echo "exist";
  die();
}

if (($nameCategoria)) {
  Categorias::insertNewCategoria($nameCategoria);
  echo "OK";
} else {
  echo "error";
}
?>  