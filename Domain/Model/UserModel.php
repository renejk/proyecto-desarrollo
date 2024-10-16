<?php

class UserModel
{
    private $id;
    private $passWord;
    private $name;
    private $last_name;
    private $role;
    private $email;
    private $phone;
    private $status;
    private $createdAt;

    public function __construct(string $id, string $passWord, string $name, string $last_name)
    {
        if (empty($id) || empty($name) || empty($last_name) || empty($email)) {
            throw new \Exception('El campo no puede estar vacío');
        }

        $validation = $this->validatePassword($passWord);
        if ($validation['status'] === false) {
            throw new \Exception($validation['error']);
        }

        $this->id = $id;
        $this->passWord = $passWord;
        $this->name = $name;
        $this->last_name = $last_name;
        $this->email = $email;
    }


    private function validatePassword(string $passWord): array
    {
        if (empty($passWord)) {
            $message = 'La contraseña no puede estar vacía<br>';
            return ['error' => $message, 'status' => false];
        }

        if (strlen($passWord) <= 12) {
            $message = 'La contraseña debe tener al menos 12 caracteres<br>';
            return ['error' => $message, 'status' => false];
        }
        return ['error' => 'OK', 'status' => true];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPassWord(): string
    {
        return $this->passWord;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getlastName(): string
    {
        return $this->last_name;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
