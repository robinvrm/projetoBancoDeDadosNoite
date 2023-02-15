<?php require_once '../classes/USER.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Loja on-line</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>
</html>

<?php
if (!empty($_POST) && (empty($_POST['login']) || empty($_POST['senha']))) {
    header("location: ../page/login.php");
    exit();
} else {
    $dadosUsuarios = USER::getUsers();

    foreach ($dadosUsuarios AS $dadoUsuario) {
        if ($dadoUsuario['login'] == $_POST['login']) {
            if ($dadoUsuario['senha'] == $_POST['senha']) {
                session_start();
                $_SESSION['login'] = $dadoUsuario['login'];
                $_SESSION['senha'] = $dadoUsuario['senha'];
                $_SESSION['ativo'] = $dadoUsuario['ativo'];
                $_SESSION['data_nascimento'] = $dadoUsuario['data_nascimento'];
                $_SESSION['data_criacao'] = $dadoUsuario['data_criacao'];
            }
        }
    }

    if (isset($_SESSION)) {
        header("location: ../page/home.php");
        exit();
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-1' role='alert'>Usuário e/ou senha incorretos!</div>";
        echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = '../page/login.php'; }, 3000); </script>";
    }
}
?>