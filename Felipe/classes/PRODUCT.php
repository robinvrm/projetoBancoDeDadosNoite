<?php
class Product
{
    public static function getProducts()
    {
        require_once '../classes/CONNECTION.php';

        return Connection::query("
            SELECT
                *
            FROM
                tb_products
            ORDER BY
                categoria, ativo DESC, id_product
        ");
    }

    public static function register($newProductName, $newProductCategory)
    {
        require_once '../classes/CONNECTION.php';

        return Connection::query("
            INSERT INTO tb_products
            (
                nome_produto,
                categoria,
                ativo,
            )
            VALUES
            (
                '{$newProductName}',
                '{$newProductCategory}',
                '1'
            )
        ");
    }

    public static function edit($updateProductName, $updateProductCategory, $updateProductStatus, $productId)
    {
        require_once '../classes/CONNECTION.php';

        return Connection::query("
            UPDATE
                tb_products
            SET
                nome_produto = '{$updateProductName}',
                categoria = '{$updateProductCategory}',
                ativo = '{$updateProductStatus}',
            WHERE TRUE
                AND id = '{$productId}'
        ");
    }
}
?>