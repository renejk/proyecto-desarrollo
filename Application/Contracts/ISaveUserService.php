<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";

interface ISaveUserService
{
    public function save(UserModel $userModel): int;
}