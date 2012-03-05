<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

namespace App\ExamplePackage\Presenter;

use App\ExamplePackage\Control;
use App\ExamplePackage\Form;
use App\ExamplePackage\Entity;
use Kdyby;
use Kdyby\Doctrine\Forms\EntityContainer;
use Nette;



/**
 */
class AddressBookPresenter extends \BasePresenter
{

	protected function beforeRender()
	{
		parent::beforeRender();
		$this['head']->titleReverse = TRUE;
		$this['head']->addTitle("Ukázková aplikace Kdyby");
		$this['head']->addTitle("Adresář");
	}


	/*********************** default *************************/


	public function renderDefault()
	{
		$this['head']->addTitle("Přehled kontaktů");
	}



	/**
	 * @return \App\ExamplePackage\Form\CreatePersonForm
	 */
	protected function createComponentAddForm()
	{
		return new Form\CreatePersonForm($this->getDoctrine(), new Entity\Person);
	}



	/**
	 * @return \App\ExamplePackage\Control\PeopleGrid
	 */
	protected function createComponentItems()
	{
		return new Control\PeopleGrid($this->getDoctrine());
	}


	/*********************** edit *************************/


	/** @var \App\ExamplePackage\Entity\Person */
	private $person;



	/**
	 * @param int $person
	 */
	public function actionEdit($person = 0)
	{
		$people = $this->getRepository('App\ExamplePackage\Entity\Person');
		if (!$this->person = $people->find($person)) {
			$this->error("Requested person does not exists.");
		}
	}



	/**
	 */
	public function renderEdit()
	{
		$this['head']->addTitle("Úprava detailů");
	}



	/**
	 * @return \App\ExamplePackage\Form\EditPersonForm
	 */
	protected function createComponentEditForm()
	{
		return new Form\EditPersonForm($this->getDoctrine(), $this->person);

		$form->addSubmit('save', 'Uložit změny údajů');
		$form->onSuccess[] = function (Form\PersonForm $form) {
			$form->presenter->flashMessage("Kontakt " . $form->values->fullname . " by upraven.");
		};
		$form->onSuccess[] = $this->lazyLink('default');

		return $form;
	}

}
