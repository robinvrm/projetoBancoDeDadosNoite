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

    <body>
        <main class="bg-dark">
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center bg-dark">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Entre com sua conta</h5>
                                        </div>
                                        <form action="../action/_auth_login.php" class="row g-3" method="POST">
                                            <div class="col-12">
                                                <label for="login" class="form-label">Usuário</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend">></span>
                                                    <input type="text" name="login" class="form-control" id="login" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="senha" class="form-label">Senha</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend">></span>
                                                    <input type="password" name="senha" class="form-control" id="senha" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-danger w-100 text-uppercase font-weight-bold" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </body>
</html>