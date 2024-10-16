<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Contracts/ISaveEventService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Repository/EventRepository.php";

class SaveEventService implements ISaveEventService
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function save(EventModel $eventModel): int
    {
        try {
            return $this->eventRepository->create($eventModel);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
