<?php session_start(); ?>
<?php require '../classes/USER.php'; ?>
<?php
/* echo $_POST['user-name'];
echo $_POST['user-login'];
echo $_POST['user-password'];
echo $_POST['user-status'];
echo $_POST['user-birthday'];
echo $_POST['user-id']; die(); */

if (!empty($_POST)) {
    if (isset($_POST['user-name']) && isset($_POST['user-login']) && isset($_POST['user-password']) && isset($_POST['user-status']) && isset($_POST['user-birthday']) && isset($_POST['user-id'])) {
        $update = 1;
        $userId = $_POST['user-id'];
        $updateUserName = $_POST['user-name'];
        $updateUserLogin = $_POST['user-login'];
        $updateUserPassword = $_POST['user-password'];
        $updateUserStatus = $_POST['user-status'];
        $updateUserBirthday = $_POST['user-birthday'];
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>Você precisa preencher as informações para o cadastro.<br>Redirecionando para o relatório...</div>";
        echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = '../page/user_report.php'; }, 3000); </script>";
    }
}

if ($update == 1) {
    $updateUser = USER::edit($updateUserName, $updateUserLogin, $updateUserPassword, $updateUserStatus, $updateUserBirthday, $userId);
    echo $updateUser;

    echo '<script>alert("Cadastro alterado com sucesso!");</script>';
    echo "<script type='text/JavaScript'>window.location.href = '../page/user_report.php';</script>";
    exit();
}
?>