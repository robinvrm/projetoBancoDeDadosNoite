<?php require_once('../start/class.php'); ?>

<?php
$userId = VALS::postG('clienteId');

if ($userId) {
  if (Users::hasUserAtivo($userId)) {
    Users::desativarUser($userId);
  } else {
    Users::ativarUser($userId);
  }

  echo "OK";
} else {
  echo "Error";
}
?>