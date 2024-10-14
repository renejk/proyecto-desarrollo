<?php

namespace App\Domain\Model;

class EventModel
{
    private $id;
    private $name;
    private $duration;
    private $asistants;
    private $eventDate;
    private $userId;

    public function __construct(string $id, string $name, string $duration, string $asistants, string $eventDate)
    {
        if (empty($id) || empty($name) || empty($duration) || empty($asistants) || empty($eventDate)) {
            throw new \Exception('El campo no puede estar vacío');
        }
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->asistants = $asistants;
        $this->eventDate = $eventDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getduration(): string
    {
        return $this->duration;
    }

    public function getasistants(): string
    {
        return $this->asistants;
    }

    public function geteventDate(): string
    {
        return $this->eventDate;
    }

    public function getuserId(): string
    {
        return $this->userId;
    }

    public function setuserId(string $userId): void
    {
        $this->userId = $userId;
    }
}