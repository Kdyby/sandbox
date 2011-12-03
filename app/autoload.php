<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

// load Nette Framework first
require_once __DIR__ . '/../vendor/nette/Nette/loader.php';

// require class loader
require_once __DIR__ . '/../vendor/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

// libraries
$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Kdyby' => __DIR__ . '/../vendor/framework/libs',
    'Symfony' => __DIR__ . '/../vendor/symfony/src',
    'Doctrine\\Common' => __DIR__ . '/../vendor/doctrine-common/lib',
    'Doctrine\\DBAL\\Migrations' => __DIR__ . '/../vendor/doctrine-migrations/lib',
    'Doctrine\\DBAL' => __DIR__ . '/../vendor/doctrine-dbal/lib',
    'Doctrine\\ORM' => __DIR__ . '/../vendor/doctrine/lib',
));
$loader->registerNamespaceFallbacks(array(
    'Kdyby' => __DIR__ . '/../vendor/cms/libs',
));
$loader->register();

// annotations
AnnotationRegistry::registerLoader(function($class) use ($loader) {
    $loader->loadClass($class);
    return class_exists($class, FALSE);
});
AnnotationRegistry::registerFile(__DIR__ . '/../vendor/doctrine/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

unset($loader); // cleanup


// RobotLoader is not suggested
if (!is_writable(__DIR__ . '/temp')) {
	throw new Nette\IOException("Temporary directory is not writable.");
}
$robot = new Nette\Loaders\RobotLoader;
$robot->setCacheStorage(new Nette\Caching\Storages\FileStorage(__DIR__ . '/temp'));
$robot->autoRebuild = TRUE;
$robot->addDirectory(__DIR__);
$robot->register();

unset($robot); // cleanup
