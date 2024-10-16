<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Contracts/ISaveUserService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Repository/UserRepository.php";

class SaveUserService implements ISaveUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function save(UserModel $userModel): int
    {
        try {
            return $this->userRepository->create($userModel);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
