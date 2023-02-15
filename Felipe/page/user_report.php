<?php require '_start.php'; ?>
<?php require '../classes/USER.php'; ?>
<?php $usersData = USER::getUsers(); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <i class="bi bi-file-earmark-bar-graph"></i>
            &nbsp; Usuários cadastrados
        </h1>
    </div>
    <?php if ($usersData) { ?>
        <div class="card w-75 table-responsive-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col" class="text-center">Login</th>
                            <th scope="col" class="text-center">Senha</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Data de Nascimento</th>
                            <th scope="col" class="text-center">Data de Criação</th>
                            <th scope="col" class="text-center">Editar/Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersData AS $user) { ?>
                            <?php
                            if ($user['ativo'] == 1) {
                                $userStatus = "<span class='text-success'>Ativo</span>";
                            } else if ($user['ativo'] == 0) {
                                $userStatus = "<span class='text-danger'>Inativo</span>";
                            }

                            $userBithday = date("d/m/Y", strtotime($user['data_nascimento']));
                            $userCreation = date("d/m/Y H:i:s", strtotime($user['data_criacao']));
                            ?>
                            <tr>
                                <td scope="row" class="text-center align-middle"><?php echo $user['id_user']; ?></td>
                                <td class="text-left align-middle text-uppercase"><?php echo $user['nome']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['login']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['senha']; ?></td>
                                <td class="text-center align-middle"><?php echo $userStatus; ?></td>
                                <td class="text-center align-middle"><?php echo $userBithday; ?></td>
                                <td class="text-center align-middle"><?php echo $userCreation; ?></td>
                                <td>
                                    <form class="row g-3 mt-1" action="./user_edit.php" method="POST">
                                        <input type="hidden" name="user-edit" value="<?php echo $user['id_user']; ?>">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                            &nbsp; Editar/Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title text-center">Não há usuários cadastrados.</h5>
            </div>
    <?php } ?>
</main>

<?php require '_end.php'; ?>