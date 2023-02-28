<?php require './_start.php'; ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <i class="bi bi-book"></i>
            &nbsp; Novo produto
        </h1>
    </div>

    <div class="card w-75">
        <div class="card-body">
            <form class="row g-3 mt-1" action="../action/_product_register.php" method="POST">
                <div class="col-md-12">
                    <label for="product-name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="product-name" name="product-name" required>
                </div>
                <div class="col-md-12">
                    <label for="product-category" class="form-label">Categoria</label>
                    <input type="text" class="form-control" id="product-category" name="product-category" required>
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