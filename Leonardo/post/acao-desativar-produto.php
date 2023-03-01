<?php require_once('../start/class.php'); ?>

<?php
$produtoId = VALS::postG('produtoId');
$usuarioId = VALS::sessionG('user_id');

if ($produtoId) {
  if (Produtos::hasProdutoAtivo($produtoId)) {
    Produtos::desativarProduto($usuarioId, $produtoId);
  } else {
    Produtos::ativarProduto($produtoId);
  }

  echo "OK";
} else {
  echo "Error";
}
?>