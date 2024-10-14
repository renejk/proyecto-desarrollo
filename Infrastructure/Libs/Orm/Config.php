<?php

namespace App\Infrastructure\Libs\Orm;

include 'App/Infrastructure/Libs/Orm/Record/ActiveRecord.php';

use App\Infrastructure\Libs\Orm\Record\ActiveRecord;

ActiveRecord\Config::initialize(function ($cfg) {
  $cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"] . "App/Infrastructure/Database/Entities");
  $cfg->set_connections(
    array(
      'development' => 'mysql://root:root@localhost/events_web',

    )
  );
});
