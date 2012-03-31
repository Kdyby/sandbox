<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

use Doctrine\Common\Annotations\AnnotationRegistry;


// load Nette Framework first
require_once __DIR__ . '/../vendor/nette/nette/Nette/loader.php';


// require class loader
require_once __DIR__ . '/../vendor/.composer/autoload.php';


// libraries
$loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
$loader->registerNamespaces(array(
	'App' => __DIR__ . '/libs',
));
$loader->register();

// robot
$robot = new Kdyby\Loaders\RobotLoader;
$robot->addDirectory(__DIR__ . '/presenters');
$robot->addDirectory(__DIR__ . '/components');
$robot->register();

// Doctrine annotations
AnnotationRegistry::registerLoader(function($class) use ($loader) {
   $loader->loadClass($class);
   return class_exists($class, FALSE);
});
AnnotationRegistry::registerFile(__DIR__ . '/../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

unset($loader, $robot); // cleanup
