<?php

namespace App\Applcation\Contracts;

include 'App/Domain/Model/EventModel.php';

use App\Domain\Model\EventModel;

interface IEventRepository 
{
    public function create(EventModel $eventModel): int;
    public function update(EventModel $eventModel): int;
    public function delete(string $eventId): int;
}