<?php require_once('../start/class.php'); ?>

<?php
$nameUser = strtoupper(addslashes(VALS::postG('nameUser')));
$cpfUser = VALS::postG('cpfUser');
$birthDateUser = VALS::postG('birthDateUser');
$login = VALS::postG('login');
$password = VALS::postG('password');
$birthDateUserSql = DATES::date_to_mysql($birthDateUser);

if (Users::hasUserRegister($cpfUser)){
  echo "exist_user";
  die();
}

if (($nameUser)) {
  Users::insertNewUser($nameUser, $cpfUser, $login, $password, $birthDateUserSql);
  echo "OK";
} else {
  echo "error";
}
?>