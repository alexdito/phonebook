<?php

namespace Market\Jeweler\Services;

use Market\Jeweler\Repository\OrderRepository;

class OrderService
{
    protected OrderRepository $repository;

    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function getOrderList(int $userId): array
    {
        return $this->repository->getUserOrders($userId);
    }

    public function createOrder(int $userId, int $sum, string $productName): void
    {
        $this->repository->createOrder($userId, $sum, $productName);
    }
}