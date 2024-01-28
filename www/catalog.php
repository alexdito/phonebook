<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$productService = new \Market\Jeweler\Services\ProductService();
$productList = $productService->getProductList();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Login Form</title>
    </head>
<body>
<div class="container">
    <div class="row">
        <div class=" ">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Украшение</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($productList as $product): ?>
                    <tr>
                        <th scope="row"><?= $product['id'] ?></th>
                        <td><?= $product['product_name']; ?></td>
                        <td>
                            <a type="button" href="?id=<?= $product['id'] ?>" class="btn btn-success">Сконфигурировать</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';
?>