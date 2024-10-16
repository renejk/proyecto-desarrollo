<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Libs/Orm/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/UserModel.php";

class EventEntity extends ActiveRecord\Model
{
    public static $table_name = 'event';

    public static $primary_key = 'id';

    public function mapperEntityToModel(): EventModel
    {
        $eventModel = new EventModel(
            $this->id,
            $this->name,
            $this->duration,
            $this->asistants,
            $this->eventDate,
            $this->userId
        );

        return $eventModel;
    }

    public static function mapperModelToEntity(EventModel $eventModel): EventEntity
    {
        $eventEntity = new EventEntity();
        $eventEntity->id = $eventModel->getId();
        $eventEntity->name = $eventModel->getName();
        $eventEntity->duration = $eventModel->getduration();
        $eventEntity->asistants = $eventModel->getasistants();
        $eventEntity->eventDate = $eventModel->geteventDate();
        $eventEntity->userId = $eventModel->getuserId();
        return $eventEntity;
    }
}
