<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Contracts/IUserReposiory.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Database/Entities/UserEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Exceptions/EntityNotFoundException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Exceptions/EntityPreExistingException.php";




class UserRepository implements IUserReposiory
{
    public function create(UserModel $userModel): int
    {
        try {
            $findUser = $this->getById($userModel->getId());
            if ($findUser !== null) {
                $message = 'El usuario con id ' . $userModel->getId() . ' ya existe';
                throw new EntityPreExistingException($message);
            }
        } catch (Exception $e) {
            $newUserEntity = new UserEntity();
            $newUserEntity->id = $userModel->getId();
            $newUserEntity->password = $userModel->getPassWord();
            $newUserEntity->name = $userModel->getName();
            $newUserEntity->last_name = $userModel->getLastName();
            $newUserEntity->email = $userModel->getEmail();
            $newUserEntity->phone = $userModel->getPhone();
            $newUserEntity->status = $userModel->getStatus();
            $newUserEntity->created_at = $userModel->getCreatedAt();
            $newUserEntity->save();
            return $this->count();
        }
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
        try {
            $findUser = UserEntity::find($userId);
            return $findUser->mapperEntityToModel();
        } catch (Exception $e) {
            $message = 'Usuario con id ' . $userId . ' no existe';
            throw new EntityNotFoundException($message);
        }
    }

    public function delete(string $userId): int
    {
        return 1;
    }

    public function count(): int
    {
        return UserEntity::count();
    }

    public function getAll(): array
    {
        return UserEntity::all();
    }
}
