<?php

namespace Market\Jeweler\Services;

use Market\Jeweler\Repository\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function getProductList(): array
    {
        return $this->productRepository->getProductList();
    }
}