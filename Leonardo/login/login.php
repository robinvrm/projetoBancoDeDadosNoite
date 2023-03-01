<?php include '../class/USERS.php'; ?>
<?php include '../class/VALS.php'; ?>
<?php
session_start();
$user = VALS::postG('user');
$password = VALS::postG('password');
$users = Users::getUsers($user, $password);

VALS::sessionS($users['id'], 'user_id');
VALS::sessionS($users['nome'], 'user_name');

if ($users) {
  echo "ok";
} else {
  echo "error";
}
