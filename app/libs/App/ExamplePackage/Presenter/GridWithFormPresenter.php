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
class GridWithFormPresenter extends \BasePresenter
{

	protected function startup()
	{
		parent::startup();

		bd($this->getDoctrine()->getDao('App\ExamplePackage\Entity\Root')->findAll());
	}



	/**
	 * @return \Kdyby\Doctrine\Forms\Form
	 */
	protected function createComponentAddForm()
	{
		$form = new Form($this->getDoctrine(), new Entity\Root());

		$form->addText('name', 'Jméno')
			->setRequired();
		$form->addSelect('daddy', 'Rodič')
			->setPrompt('<rodič>')
			->setMapper('name');

		$form->addSubmit('add', 'Přidat');
		$form->onSuccess[] = function ($form, $entity) {
			dump($entity);
		};
		$form->onSuccess[] = function (Form $form) {
			$form->presenter->flashMessage("Přidán " . $form->values->name);
		};
		$form->onSuccess[] = $this->lazyLink('this');

		return $form;
	}



	/**
	 * @return \Kdyby\Components\Grinder\Grid
	 */
	protected function createComponentItems()
	{
		$qb = $this->getDoctrine()->getDao('App\ExamplePackage\Entity\Root')
			->createQueryBuilder('r');

		return new \Kdyby\Components\Grinder\Grid($qb);
	}

}
