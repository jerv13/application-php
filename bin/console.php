<?php // console.php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/server.php';

use Symfony\Component\Console\Application;

/* <application> ============================ */
/** @var \Psr\Container\ContainerInterface $serviceContainer */
$serviceContainer = require __DIR__ . '/../config/container.php';
$application = new Application('console', $server->getVersion());

$commands = $serviceContainer->get('config')['console']['commands'];
foreach ($commands as $command) {
    $application->add($serviceContainer->get($command));
}
/* </application> ============================ */

$application->run();
