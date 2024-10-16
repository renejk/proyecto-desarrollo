<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/EventModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Contracts/IEventReposiory.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Database/Entities/EventEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Exceptions/EntityNotFoundException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Exceptions/EntityPreExistingException.php";




class EventRepository implements IEventRepository
{
    public function create(EventModel $eventModel): int
    {
        try {
            $findEvent = $this->getById($eventModel->getId());
            if ($findEvent !== null) {
                $message = 'El evento con id ' . $eventModel->getId() . ' ya existe';
                throw new EntityPreExistingException($message);
            }
        } catch (Exception $e) {
            $newEventEntity = new EventEntity();
            $newEventEntity->id = $eventModel->getId();
            $newEventEntity->name = $eventModel->getName();
            $newEventEntity->duration = $eventModel->getduration();
            $newEventEntity->asistants = $eventModel->getasistants();
            $newEventEntity->eventDate = $eventModel->geteventDate();
            $newEventEntity->userId = $eventModel->getuserId();
            $newEventEntity->save();
            return $this->count();
        }
    }

    public function update(EventModel $eventModel): void
    {
        try {
            $event = EventEntity::find($eventModel->getId());
            $event->name = $eventModel->getName();
            $event->duration = $eventModel->getduration();
            $event->asistants = $eventModel->getasistants();
            $event->eventDate = $eventModel->geteventDate();
            $event->userId = $eventModel->getuserId();
            $event->save();
        } catch (Exception $e) {
            $message = 'Evento con id ' . $eventModel->getId() . ' no existe';
            throw new EntityNotFoundException($message);
        }
    }

    public function getById(string $eventId): EventModel
    {
        try {
            $findEvent = EventEntity::find($eventId);
            return $findEvent->mapperEntityToModel();
        } catch (Exception $e) {
            $message = 'Evento con id ' . $eventId . ' no existe';
            throw new EntityNotFoundException($message);
        }
    }

    public function delete(string $eventId): void
    {
        try {
            $eventEntity = EventEntity::find($eventId);
            $eventEntity->delete();
        } catch (Exception $e) {
            $message = 'Evento con id ' . $eventId . ' no existe';
            throw new EntityNotFoundException($message);
        }
    }

    public function count(): int
    {
        return EventEntity::count();
    }

    public function getAll(): array
    {
        $eventsEntityList = EventEntity::all();
        $eventsModelList = [];
        foreach ($eventsEntityList as $eventEntity) {
            $eventModel = $eventEntity->mapperEntityToModel();
            $eventsModelList[] = $eventModel;
        }
        return $eventsModelList;
    }
}
