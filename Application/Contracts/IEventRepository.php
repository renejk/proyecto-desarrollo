<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/EventModel.php";

interface IEventRepository 
{
    public function create(EventModel $eventModel): int;
    public function update(EventModel $eventModel): int;
    public function delete(string $eventId): int;
    public function getById(string $eventId): EventModel;
    public function getAll(): array;
}