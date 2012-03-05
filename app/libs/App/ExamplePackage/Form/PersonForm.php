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
class PersonForm extends Kdyby\Doctrine\Forms\Form
{

	/**
	 */
	protected function configure()
	{
		$this->addText('fullname', 'Celé jméno')->setRequired();
		$this->addDate('birthday', 'Narozeniny');
		$this->addText('phone', 'Telefón');
		$this->addText('email', 'E-mail');
		$address = $this->addOne('address');
		$address->addText('street', 'Ulice');
		$address->addText('number', 'čp.');
		$address->addText('city', 'Město');
		$address->addText('zip', 'PSČ');
		$this->addText('note', 'Poznámka');
	}

}
