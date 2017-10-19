<?php declare(strict_types=1);

use Kdyby\Console\Application;
use Nette\DI\Container;

/** @var Container $container */
$container = require __DIR__ . "/../app/bootstrap.php";

/** @var Application $console */
$console = $container->getByType(Application::class);
$console->run();
