<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$productService = new \Market\Jeweler\Services\ProductService();
$materialService = new \Market\Jeweler\Services\MaterialService();
$stoneService = new \Market\Jeweler\Services\StoneService();

$productList = $productService->getItemList();
$materialList = $materialService->getItemList();
$stoneList = $stoneService->getItemList();

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script
                src="https://code.jquery.com/jquery-3.6.3.js"
                integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
                crossorigin="anonymous">
        </script>
        <script src="/catalog/script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Каталог</title>
    </head>
<body>
<div class="container">
    <div class="row">
        <div class=" ">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($productList as $product): ?>
                    <form class="card">
                        <input type="hidden" name="product_id" value="<?=$product['id']; ?>">
                        <div class="row" style="margin: 5px; border-radius: 5px;">
                            <img style="width: 100%; height: 200px" src="<?= $product['picture_src'] ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['product_name']; ?></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This card has even longer content than the first
                                to
                                show that equal height action.</p>

                            <div class="row">
                                <div class="col">
                                    <div class="row product-material">
                                        <div class="col">
                                            <div class="row">
                                                <p class="card-text">Материал:</p>
                                            </div>
                                        </div>

                                        <div style="margin-top: 5px" class="row product-material-block">
                                            <div class="col-6">
                                                <select name="material[]" style="height: 40px"
                                                        class="form-select ">
                                                    <?php foreach ($materialList as $material): ?>
                                                        <option selected
                                                                value="<?= $material['id'] ?>"><?= $material['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <input name="material_weight[]" style="height: 40px"
                                                       type="number" min="1" value="1"
                                                       class="form-control form-control-sm"
                                                       id="colFormLabelSm"
                                                       placeholder="col-form-label-sm">
                                            </div>
                                            <div style="color: black" class="col-1">
                                                X
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div style="padding-top: 10px; text-align: right">
                                                <button type="button" class="btn btn-primary add-material">Добавить
                                                    материал
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <p class="card-text">Вставка:</p>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <select name="stone" style="height: 40px" class="form-select ">
                                                    <?php foreach ($stoneList as $stone): ?>
                                                        <option selected
                                                                value="<?= $stone['id'] ?>"><?= $stone['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input name="stone_weight" style="height: 40px" type="number" min="1"
                                                       value="1"
                                                       class="form-control form-control-sm" id="colFormLabelSm"
                                                       placeholder="col-form-label-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="margin-bottom: 8px" type="button" class="btn btn-success add_product" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Заказать
                        </button>
                    </form>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Заказ создан</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body" id="orderModalText">
                ...
            </div>
            <div class="modal-footer">
                <button id="close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';
?>