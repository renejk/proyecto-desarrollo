<?php

namespace App\Infrastructure\Repository;

include 'App/Domain/Model/UserModel.php';
include 'App/Contracts/IUserReposiory.php';

use App\Domain\Model\UserModel;
use App\Applcation\Contracts\IUserReposiory;

class UserRepository implements IUserReposiory
{
    public function create(UserModel $userModel): int
    {
        $user = new UserModel(
            $userModel->getId(),
            $userModel->getPassWord(),
            $userModel->getName(),
            $userModel->getLastName()
        );
        return $user->getId();
    }

    public function update(UserModel $userModel): int
    {
        $user = new UserModel(
            $userModel->getId(),
            $userModel->getPassWord(),
            $userModel->getName(),
            $userModel->getLastName()
        );
        return $user->getId();
    }

    public function getById(string $userId): UserModel
    {
        $user = new UserModel(
            $userId,
            '123456',
            'John',
            'Doe'
        );
        return $user;
    }

    public function delete(string $userId): int
    {
        return 1;
    }
}