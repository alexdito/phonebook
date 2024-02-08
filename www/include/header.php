<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ювелирный магазин</title>
</head>
<body>
<?php if ($_SERVER['SCRIPT_NAME'] !== '/index.php'): ?>
    <ul style="margin-bottom: 5px" class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/' ? 'active' : '' ?>" aria-current="page" href="#">Добрый день <?= $_SESSION['MARKET']['LOGIN']['fio']?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/catalog/' ? 'active' : '' ?>" href="/catalog/">Каталог</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/orders/' ? 'active' : '' ?>" href="/orders/">Заказы</a>
        </li>
    </ul>
<?php endif; ?>
