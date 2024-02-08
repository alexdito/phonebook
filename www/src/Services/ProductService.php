<?php

namespace Market\Jeweler\Services;

use Market\Jeweler\Repository\ProductRepository;

class ProductService
{
    protected ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function getItemList(): array
    {
        return $this->repository->getItemList();
    }

    public function getItemById(int $id): array
    {
        return $this->repository->getItemById($id);
    }
}