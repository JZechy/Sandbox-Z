<?php

use Nette\Application\Application;

//require __DIR__ . '/.maintenance.php';

$container = require __DIR__ . "/../app/bootstrap.php";
$container->getByType(Application::class)->run();