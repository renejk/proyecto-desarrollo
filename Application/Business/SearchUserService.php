<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Contracts/ISearchUserService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Repository/UserRepository.php";

class SearchUserService implements ISearchUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function search(string $name): array
    {
        try {
            return $this->userRepository->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
