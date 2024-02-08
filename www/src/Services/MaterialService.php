<?php

namespace Market\Jeweler\Services;

use Market\Jeweler\Repository\MaterialRepository;

class MaterialService
{
    protected MaterialRepository $repository;

    public function __construct()
    {
        $this->repository = new MaterialRepository();
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