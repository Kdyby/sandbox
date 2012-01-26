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
require_once __DIR__ . '/../vendor/nette/Nette/loader.php';

// require class loader
require_once __DIR__ . '/../vendor/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

// libraries
$loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
$loader->registerNamespaces(array(
	'App' => __DIR__ . '/libs',
	'Kdyby' => __DIR__ . '/../vendor/framework/libs',
	'Symfony' => __DIR__ . '/../vendor/symfony/src',
	'Doctrine\\Common\\DataFixtures' => __DIR__ . '/../vendor/doctrine-data-fixtures/lib',
	'Doctrine\\Common' => __DIR__ . '/../vendor/doctrine-common/lib',
	'Doctrine\\DBAL\\Migrations' => __DIR__ . '/../vendor/doctrine-migrations/lib',
	'Doctrine\\DBAL' => __DIR__ . '/../vendor/doctrine-dbal/lib',
	'Doctrine\\ORM' => __DIR__ . '/../vendor/doctrine/lib',
	'DoctrineExtensions' => __DIR__ . '/../vendor/doctrine-extensions/lib',
	'Gedmo' => __DIR__ . '/../vendor/doctrine-gedmo/lib',
	'Assetic' => __DIR__ . '/../vendor/assetic/src',
));
$loader->registerNamespaceFallbacks(array(
    'Kdyby' => __DIR__ . '/../vendor/cms/libs',
));
$loader->register();

// annotations
AnnotationRegistry::registerLoader(function ($class) use ($loader) {
    $loader->loadClass($class);
    return class_exists($class, FALSE);
});
AnnotationRegistry::registerFile(__DIR__ . '/../vendor/doctrine/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

// robot
$robot = new Kdyby\Loaders\RobotLoader;
$robot->addDirectory(__DIR__ . '/presenters');
$robot->addDirectory(__DIR__ . '/components');
$robot->register();

unset($loader, $robot); // cleanup
