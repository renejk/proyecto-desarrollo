<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Libs/Orm/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";


class UserEntity extends ActiveRecord\Model
{
    public static $table_name = 'user';

    public static $primary_key = 'id';

    public function mapperEntityToModel(): UserModel
    {
        $userModel = new UserModel(
            $this->id,
            $this->password,
            $this->name,
            $this->last_name
        );
        $userModel->setEmail($this->email);
        $userModel->setPhone($this->phone);
        $userModel->setStatus($this->status);
        $userModel->setCreatedAt($this->created_at);
        return $userModel;
    }

    public static function mapperModelToEntity(UserModel $userModel): UserEntity
    {
        $userEntity = new UserEntity();
        $userEntity->id = $userModel->getId();
        $userEntity->password = $userModel->getPassWord();
        $userEntity->name = $userModel->getName();
        $userEntity->last_name = $userModel->getLastName();
        $userEntity->email = $userModel->getEmail();
        $userEntity->phone = $userModel->getPhone();
        $userEntity->status = $userModel->getStatus();
        $userEntity->created_at = $userModel->getCreatedAt();
        return $userEntity;
    }
}
