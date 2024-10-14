<?php

namespace App\Applcation\Contracts;

include 'App/Domain/Model/UserModel.php';

use App\Domain\Model\UserModel;

interface IUserReposiory 
{
   
    public function create(UserModel $userModel): int;
    public function update(UserModel $userModel): int;
    public function getById(string $userId): UserModel;
    public function delete(string $userId): int;
}