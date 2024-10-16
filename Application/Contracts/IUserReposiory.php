<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";


interface IUserReposiory
{

    public function create(UserModel $userModel): int;
    public function update(UserModel $userModel): int;
    public function getById(string $userId): UserModel;
    public function delete(string $userId): int;
    public function count(): int;
    public function getAll(): array;
}
