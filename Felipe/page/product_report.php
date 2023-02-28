<?php require '_start.php'; ?>
<?php require '../classes/PRODUCT.php'; ?>
<?php $productsData = PRODUCT::getProducts(); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <i class="bi bi-file-earmark-bar-graph"></i>
            &nbsp; Produtos cadastrados
        </h1>
    </div>
    <?php if ($productsData) { ?>
        <div class="card w-75 table-responsive-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col" class="text-center">Categoria</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Data de Criação</th>
                            <th scope="col" class="text-center">Editar/Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productsData AS $product) { ?>
                            <?php
                            if ($product['ativo'] == 1) {
                                $productStatus = "<span class='text-success'>Ativo</span>";
                            } else if ($product['ativo'] == 0) {
                                $productStatus = "<span class='text-danger'>Inativo</span>";
                            }

                            $productCreation = date("d/m/Y H:i:s", strtotime($product['data_criacao']));
                            ?>
                            <tr>
                                <td scope="row" class="text-center align-middle"><?php echo $product['id_product']; ?></td>
                                <td class="text-left align-middle text-uppercase"><?php echo $product['nome_produto']; ?></td>
                                <td class="text-center align-middle"><?php echo $product['categoria']; ?></td>
                                <td class="text-center align-middle"><?php echo $productStatus; ?></td>
                                <td class="text-center align-middle"><?php echo $productCreation; ?></td>
                                <td>
                                    <form class="row g-3 mt-1" action="./product_edit.php" method="POST">
                                        <input type="hidden" name="product-edit" value="<?php echo $product['id_product']; ?>">
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
                <h5 class="card-title text-center">Não há produtos cadastrados.</h5>
            </div>
    <?php } ?>
</main>

<?php require '_end.php'; ?>