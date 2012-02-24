<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

namespace App\ExamplePackage\Presenter;

use App\ExamplePackage\Entity;
use Kdyby;
use Kdyby\Doctrine\Forms\Form;
use Kdyby\Doctrine\Forms\EntityContainer;
use Nette;



/**
 */
class EntityFormAddPresenter extends \BasePresenter
{

	/**
	 * @return \Kdyby\Doctrine\Forms\Form
	 */
	protected function createComponentForm()
	{
		$root = new Entity\Root();
		$form = new Form($this->context->doctrine, $root);

		$form->addText('name', 'Jméno');
		$form->addSelect('daddy', 'Táta')->setMapper('name');
		$form->addMany('children', function (EntityContainer $container) {
			$container->addText('name');
		});

		$form->addSubmit('add', 'Přidat');
		$form->onSuccess[] = callback($this, 'handleFormSuccess');

		return $form;
	}



	/**
	 * @param \Kdyby\Doctrine\Forms\Form $form
	 * @param object $entity
	 */
	public function handleFormSuccess(Form $form, $entity)
	{
		dump($entity);
	}

}
