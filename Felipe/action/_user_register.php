<?php session_start(); ?>
<?php require '../classes/USER.php'; ?>
<?php
if (!empty($_POST)) {
    if (isset($_POST['user-name']) && isset($_POST['user-login']) && isset($_POST['user-password']) && isset($_POST['user-birthday'])) {
        $register = 1;
        $newUserName = $_POST['user-name'];
        $newUserLogin = $_POST['user-login'];
        $newUserPassword = $_POST['user-password'];
        $newUserBirthday = $_POST['user-birthday'];
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>Você precisa preencher as informações para o cadastro.<br>Redirecionando para o cadastro...</div>";
        echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = '../page/user_registration.php'; }, 3000); </script>";
    }
}

if ($register == 1) {
    $registerNewUser = USER::register($newUserName, $newUserLogin, $newUserPassword, $newUserBirthday);
    echo $registerNewUser;

    echo '<script>alert("Cadastro realizado com sucesso!");</script>';
    echo "<script type='text/JavaScript'>window.location.href = '../page/user_registration.php';</script>";
    exit();
}
?>