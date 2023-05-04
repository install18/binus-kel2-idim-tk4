<?php

if (!session_id()) session_start();

require_once 'core/App.php';
require_once 'controller/BaseController.php';
require_once 'database/Database.php';

require_once 'config/Config.php';

$app = new App;

