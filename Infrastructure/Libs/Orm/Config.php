<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "proyectp-desarrollo/Infrastructure/Libs/Orm/Record/ActiveRecord.php";


ActiveRecord\Config::initialize(function ($cfg) {
  $cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"] . "App/Infrastructure/Database/Entities");
  $cfg->set_connections(
    [
      'development' => 'mysql://root:root@localhost/events_web',

    ]
  );
});
