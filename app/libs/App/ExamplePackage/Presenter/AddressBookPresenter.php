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

	/**
	 * @return \App\ExamplePackage\Form\PersonForm
	 */
	protected function createComponentAddForm()
	{
		$form = new Form\PersonForm($this->getDoctrine(), new Entity\Person);

		$form->addSubmit('add', 'Přidat');
		$form->onSuccess[] = function (Form\PersonForm $form) {
			$form->presenter->flashMessage("Přidán(a) " . $form->values->fullname);
		};
		$form->onSuccess[] = $this->lazyLink('this');

		return $form;
	}



	/**
	 * @return \App\ExamplePackage\Control\PeopleGrid
	 */
	protected function createComponentItems()
	{
		return new Control\PeopleGrid($this->getDoctrine());
	}

}
