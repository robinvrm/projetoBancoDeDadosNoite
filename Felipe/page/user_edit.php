<?php require './_start.php'; ?>
<?php require '../classes/USER.php'; ?>
<?php $usersData = USER::getUsers(); ?>
<?php
if (!empty($_POST)) {
    if (isset($_POST['user-edit'])) {
        $userId = $_POST['user-edit'];
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>Você precisa selecionar um usuário para edição.<br>Redirecionando para o login...</div>";
        echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = './user_report.php'; }, 3000); </script>";
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <i class="bi bi-book"></i>
            &nbsp; Editar usuário
        </h1>
    </div>

    <div class="card w-75">
        <div class="card-body">
            <?php foreach ($usersData AS $user) { ?>
                <?php if ($user['id_user'] == $userId) {?>
                    <form class="row g-3 mt-1" action="../action/_user_edit.php" method="POST">
                        <div class="col-md-2">
                            <label for="user-id-show" class="form-label">ID</label>
                            <input type="text" class="form-control text-center" id="user-id-show" name="user-id-show"  value="<?php echo $user['id_user']; ?>" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="user-name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="user-name" name="user-name"  value="<?php echo $user['nome']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="user-login" class="form-label">Login</label>
                            <input type="text" class="form-control" id="user-login" name="user-login"  value="<?php echo $user['login']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="user-password" class="form-label">Senha</label>
                            <input type="text" class="form-control" id="user-password" name="user-password" value="<?php echo $user['senha']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="user-birthday" class="form-label">Data de Nascimento</label>
                            <input type="text" class="form-control" id="user-birthday" name="user-birthday"  value="<?php echo $user['data_nascimento']; ?>" required>
                            <small><p class="text-center text-muted">Formato: yyyy-mm-dd</p></small>
                        </div>
                        <div class="col-md-12">
                            <label for="user-status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="user-status" name="user-status"  value="<?php echo $user['ativo']; ?>" required>
                            <small><p class="text-center text-muted">Inativo: 0, Ativo: 1, Excluído: 2</p></small>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="user-id" value="<?php echo $user['id_user']; ?>">
                            <button type="submit" class="btn btn-danger">
                                Salvar alterações
                            </button>
                        </div>
                    </form>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</main>

<?php require '_end.php'; ?>