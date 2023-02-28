<?php require './_start.php'; ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <i class="bi bi-book"></i>
            &nbsp; Novo usuário
        </h1>
    </div>

    <div class="card w-75">
        <div class="card-body">
            <form class="row g-3 mt-1" action="../action/_user_register.php" method="POST">
                <div class="col-md-12">
                    <label for="user-name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="user-name" name="user-name" required>
                </div>
                <div class="col-md-12">
                    <label for="user-login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="user-login" name="user-login" required>
                </div>
                <div class="col-md-12">
                    <label for="user-password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="user-password" name="user-password" required>
                </div>
                <div class="col-md-12">
                    <label for="user-birthday" class="form-label">Data de Nascimento</label>
                    <input type="text" class="form-control" id="user-birthday" name="user-birthday" required>
                    <small><p class="text-center text-muted">Formato: yyyy-mm-dd</p></small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require '_end.php'; ?>