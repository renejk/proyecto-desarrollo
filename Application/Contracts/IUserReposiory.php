<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";


interface IUserReposiory
{

    public function create(UserModel $userModel): int;
    public function update(UserModel $userModel): void;
    public function getById(string $userId): UserModel;
    public function delete(string $userId): void;
    public function count(): int;
    public function getAll(): array;
}
