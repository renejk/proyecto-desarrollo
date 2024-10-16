<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Repository/UserRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Business/SaveUserService.php";


class UserController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function actionExecute()
    {
        $action = $_REQUEST['action'];

        switch ($action) {
            case 'create':
                $this->create();
                break;
        }
    }

    private function create()
    {
        try {
            $name = $_POST['name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $status = $_POST['status'];

            $newUserModel = new UserModel($name, $last_name, $email, $phone, $password, $role, $status);
            $newUserModel->setEmail($email);
            $newUserModel->setPhone($phone);
            $newUserModel->setStatus($status);

            $saveUserService = new SaveUserService($this->userRepository);
            $total =  $saveUserService->save($newUserModel);
            $message = "El usuario ha sido registrado con exito, Total de usuarios registrados: $total";
            header("Location: ../Views/Forms/Users/Create.php?message=$message");
        } catch (Exception $e) {
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Users/Create.php?message=$message");
        }
    }
}

$userRepository = new UserRepository();

$userController = new UserController($userRepository);

$userController->actionExecute();
