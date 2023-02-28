<?php session_start(); ?>
<?php require '../classes/PRODUCT.php'; ?>
<?php
if (!empty($_POST)) {
    if (isset($_POST['product-name']) && isset($_POST['product-category']) && isset($_POST['product-status']) && isset($_POST['product-id'])) {
        $update = 1;
        $productId = $_POST['product-id'];
        $updateProductName = $_POST['product-name'];
        $updateProductCategory = $_POST['product-category'];
        $updateProductStatus = $_POST['product-status'];
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>Você precisa preencher as informações para o cadastro.<br>Redirecionando para o relatório...</div>";
        echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = '../page/product_report.php'; }, 3000); </script>";
    }
}

if ($update == 1) {
    $updateProduct = PRODUCT::edit($updateProductName, $updateProductCategory, $updateProductStatus, $productId);
    echo $updateProduct;

    echo '<script>alert("Cadastro alterado com sucesso!");</script>';
    echo "<script type='text/JavaScript'>window.location.href = '../page/product_report.php';</script>";
    exit();
}
?>