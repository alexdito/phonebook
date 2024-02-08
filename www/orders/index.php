<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';


$orderService = new \Market\Jeweler\Services\OrderService();
$userProductList = $orderService->getOrderList($_SESSION['MARKET']['LOGIN']['id']);

if (count($userProductList) > 0):
    ?>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название товара</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($userProductList as $key => $product): ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $product['product_name'] ?></td>
                    <td><?= $product['sum'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php
else:
    echo 'Вы ничего не заказывали!';
endif;

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';
