<?php

require_once 'core/App.php';
require_once 'controllers/BaseController.php';
require_once 'database/Database.php';

require_once 'config/Config.php';

$app = new App;

if (!isset($_SESSION['username'])) {
    header('Location: ' . BASEURL . 'Login');
    exit();
}