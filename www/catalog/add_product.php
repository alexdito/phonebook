<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$orderService = new \Market\Jeweler\Services\OrderService();
$productService = new \Market\Jeweler\Services\ProductService();
$materialService = new \Market\Jeweler\Services\MaterialService();
$stoneService = new \Market\Jeweler\Services\StoneService();

$masterJob = 5000;

$totalPrice = 0;
$totalPrice += $masterJob;

for ($i = 0; $i < count($_REQUEST['material']); $i++) {
    $totalPrice += $materialService->getItemById($_REQUEST['material'][$i])['price'] * $_REQUEST['material_weight'][$i];
}

$totalPrice += $stoneService->getItemById($_REQUEST['stone'])['price'] * $_REQUEST['stone_weight'];

$productName = $productService->getItemById($_REQUEST['product_id'])['product_name'];

$userProductList = $orderService->getOrderList($_SESSION['MARKET']['LOGIN']['id']);
if (count($userProductList) > 0) {
    $totalPrice = $totalPrice * 0.9;
}

$orderService = new \Market\Jeweler\Services\OrderService();
$orderService->createOrder($_SESSION['MARKET']['LOGIN']['id'], $totalPrice, $productName);

ob_clean();

echo json_encode(['response' => sprintf('Спасибо за заказ. Приблизительная стоимость украшения %d рублей.', $totalPrice)]);

die();