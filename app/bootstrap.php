<?php declare(strict_types=1);

use Nette\Configurator;

require __DIR__ . "/../vendor/autoload.php";

$configurator = new Configurator();
$configurator->setDebugMode(["127.0.0.1", "::1"]);
$configurator->enableDebugger(__DIR__ . "/../log");
$configurator->setTempDirectory(__DIR__ . "/../temp");
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . "/config/config.local.neon");
$configurator->addConfig(__DIR__ . "/config/config.neon");

return $configurator->createContainer();
