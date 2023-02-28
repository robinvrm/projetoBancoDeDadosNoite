<?php session_start(); ?>
<?php require '../classes/PRODUCT.php'; ?>
<?php
if (!empty($_POST)) {
    if (isset($_POST['product-name']) && isset($_POST['product-category'])) {
        $register = 1;
        $newProductName = $_POST['product-name'];
        $newProductCategory = $_POST['product-category'];
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>Você precisa preencher as informações para o cadastro.<br>Redirecionando para o cadastro...</div>";
        echo "<script type='text/JavaScript'> setTimeout(function () { window.location.href = '../page/product_registration.php'; }, 3000); </script>";
    }
}

if ($register == 1) {
    $registerNewProduct = PRODUCT::register($newProductName, $newProductCategory);
    echo $registerNewProduct;

    echo '<script>alert("Cadastro realizado com sucesso!");</script>';
    echo "<script type='text/JavaScript'>window.location.href = '../page/product_registration.php';</script>";
    exit();
}
?>