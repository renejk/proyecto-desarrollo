<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Domain/Model/EventModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Repository/EventRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Application/Business/SaveEventService.php";

class EventController
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function actionExecute()
    {
        $action = $_REQUEST['action'];

        switch ($action) {
            case 'create':
                $this->create();
                break;
        }
    }

    private function create()
    {
        try {
            $newEventModel = new EventModel($_POST['id'], $_POST['name'], $_POST['duration'], $_POST['asistants'], $_POST['eventDate']);

            $saveEventService = new SaveEventService($this->eventRepository);
            $total =  $saveEventService->save($newEventModel);
            $message = "El evento ha sido registrado con exito, Total de eventos registrados: $total";
            header("Location: ../Views/Forms/Events/Create.php?message=$message");
        } catch (Exception $e) {
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Events/Create.php?message=$message");
        }
    }
}

$eventRepository = new EventRepository();

$eventController = new EventController($eventRepository);

$eventController->actionExecute();
