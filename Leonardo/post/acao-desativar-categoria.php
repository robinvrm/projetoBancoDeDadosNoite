<?php require_once('../start/class.php'); ?>

<?php
$categoriaId = VALS::postG('categoriaId');

if ($categoriaId) {
  if (Categorias::hasCAtegoriaAtiva($categoriaId)) {
    Categorias::desativarCategoria($categoriaId);
  } else {
    Categorias::ativarCategoria($categoriaId);
  }

  echo "OK";
} else {
  echo "Error";
}
?>