<?php

namespace Market\Jeweler\Services;

use Market\Jeweler\Repository\StoneRepository;

class StoneService
{
    protected StoneRepository $repository;

    public function __construct()
    {
        $this->repository = new StoneRepository();
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