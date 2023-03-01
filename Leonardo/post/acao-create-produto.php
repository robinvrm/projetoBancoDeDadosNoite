<?php require_once('../start/class.php'); ?>

<?php
$nomeProduto = strtoupper(addslashes(VALS::postG('nomeProduto')));
$categoriaId = VALS::postG('categoria');
$usuarioId = VALS::sessionG('user_id');

if (Produtos::hasProdutoNome($nomeProduto)) {
  echo "exist";
  die();
}

if (($nomeProduto)) {
  Produtos::insertNewProduto($usuarioId, $categoriaId, $nomeProduto);
  echo "OK";
} else {
  echo "error";
}
?>  