<?php

namespace Market\Jeweler\Services;

use Exception;
use Market\Jeweler\Repository\UserRepository;

class UserService
{
    protected UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    /**
     * @throws Exception
     */
    public function registration(string $fio, string $phone): int
    {
        if ($fio === "" || $phone === '') {
            throw new Exception("Вы не ввели ФИО полностью!");
        }

        if ($this->login($fio, $phone) > 0) {
            throw new Exception("Пользователь уже существует");
        }

        $this->repository->createUser($fio, $phone);

        $id = $this->login($fio, $phone);

        if ($id <= 0) {
            throw new Exception("Ошибка при регистрации");
        }

        return $id;
    }

    /**
     * @throws Exception
     */
    public function login(string $fio, string $phone): int
    {
        if ($fio === "" || $phone === '') {
            throw new Exception("Вы не ввели ФИО полностью!");
        }

        $users = $this->repository->getUser($fio, $phone);

        $_SESSION['MARKET']['LOGIN'] = $users;

        if ($users === false) {
            return 0;
        }

        return (int)$users['id'];
    }

    public function logout()
    {
        session_destroy();
    }
}