<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/EventModel.php";

interface ISaveEventService
{
    public function save(EventModel $eventModel): int;
}
