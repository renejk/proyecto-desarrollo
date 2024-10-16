<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";

interface ISearchUserService
{
    public function search(string $name): array;
}