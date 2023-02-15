<?php session_start(); ?>
<?php
if (isset($_SESSION['login'])) {
    $usuarioNome = $_SESSION['login'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja on-line</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Loja on-line</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <?php if (isset($usuarioNome)) { ?>
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="../img/profile.png" class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2 me-2 text-capitalize">
                                <?php echo $usuarioNome; ?>
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6 class="text-capitalize">
                                    <?php echo $usuarioNome; ?>
                                </h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="./_logout.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sair</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <?php } else { ?>
            <?php
            echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>Você precisa estar logado para comprar<br>Redirecionando para o login...</div>";
            echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = './login.php'; }, 3000); </script>";
            ?>
        <?php } ?>
    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <?php if (isset($usuarioNome)) { ?>
                <li class="nav-item">
                    <a class="nav-link " href="./home.php">
                        <i class="bi bi-grid"></i>
                        <span class="text-uppercase">Home</span>
                    </a>
                </li>
                <li class="nav-heading">Cadastros</li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="./user_registration.php" aria-current="true">
                        <i class="bi bi-book"></i>
                        <span>Cadastro usuário</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="./product_registration.php">
                        <i class="bi bi-cart3"></i>
                        <span>Cadastro produto</span>
                    </a>
                </li>
                <li class="nav-heading">Relatórios</li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="./user_report.php">
                        <i class="bi bi-card-list"></i>
                        <span>Relatório de usuários</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="./product_report.php">
                        <i class="bi bi-card-list"></i>
                        <span>Relatório de produtos</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </aside>