<?php require '../classes/USER.php'; ?>
<?php
session_start();
$logout = USER::logout();
echo $logout;
?>