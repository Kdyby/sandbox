<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

namespace App\ExamplePackage\Form;

use Kdyby;
use Nette;



/**
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 */
class CreatePersonForm extends Kdyby\Doctrine\Forms\Form
{

	/**
	 */
	protected function configure()
	{
		$this->addText('fullname', 'Celé jméno')
			->setRequired();
		$this->addDate('birthday', 'Narozeniny');
		$this->addText('phone', 'Telefon');
		$this->addText('email', 'E-mail');

		$this->addSubmit('add', 'Přidat');
	}



	public function handleSuccess()
	{
		$this->presenter->flashMessage("Přidán(a) " . $this->values->fullname);
		$this->presenter->redirect('this');
	}

}
