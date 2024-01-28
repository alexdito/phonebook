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
    public function registration(string $firstName, string $lastName, string $secondName): int
    {
        if ($firstName === "" || $lastName === '' || $secondName === '') {
            throw new Exception("Вы не ввели ФИО полностью!");
        }

        if ($this->login($firstName, $lastName, $secondName) > 0) {
            throw new Exception("Пользователь уже существует");
        }

        $this->repository->createUser($firstName, $lastName, $secondName);

        $id = $this->login($firstName, $lastName, $secondName);

        if ($id <= 0) {
            throw new Exception("Ошибка при регистрации");
        }

        return $id;
    }

    /**
     * @throws Exception
     */
    public function login(string $firstName, string $lastName, string $secondName): int
    {
        if ($firstName === "" || $lastName === '' || $secondName === '') {
            throw new Exception("Вы не ввели ФИО полностью!");
        }

        $users = $this->repository->getUser($firstName, $lastName, $secondName);

        $_SESSION['MARKET']['LOGIN'] = $users;

        return (int)$users['id'];
    }

    public function logout()
    {
        session_destroy();
    }
}