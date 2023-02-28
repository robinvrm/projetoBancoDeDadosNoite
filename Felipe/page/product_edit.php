<?php require './_start.php'; ?>
<?php require '../classes/PRODUCT.php'; ?>
<?php $productsData = PRODUCT::getproducts(); ?>
<?php
if (!empty($_POST)) {
    if (isset($_POST['product-edit'])) {
        $productId = $_POST['product-edit'];
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>Você precisa selecionar um produto para edição.<br>Redirecionando para o login...</div>";
        echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = './product_report.php'; }, 3000); </script>";
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <i class="bi bi-book"></i>
            &nbsp; Editar produto
        </h1>
    </div>

    <div class="card w-75">
        <div class="card-body">
            <?php foreach ($productsData AS $product) { ?>
                <?php if ($product['id_product'] == $productId) {?>
                    <form class="row g-3 mt-1" action="../action/_product_edit.php" method="POST">
                        <div class="col-md-2">
                            <label for="product-id-show" class="form-label">ID</label>
                            <input type="text" class="form-control text-center" id="product-id-show" name="product-id-show"  value="<?php echo $product['id_product']; ?>" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="product-name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="product-name" name="product-name"  value="<?php echo $product['nome_produto']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="product-category" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="product-category" name="product-category"  value="<?php echo $product['categoria']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="product-status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="product-status" name="product-status"  value="<?php echo $product['ativo']; ?>" required>
                            <small><p class="text-center text-muted">Inativo: 0, Ativo: 1, Excluído: 2</p></small>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="product-id" value="<?php echo $product['id_product']; ?>">
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