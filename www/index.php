<?php

// load bootstrap file
require_once __DIR__ . '/../app/autoload.php';

// Run the application
$app = new Kdyby\Application\Application();
$app->run();
