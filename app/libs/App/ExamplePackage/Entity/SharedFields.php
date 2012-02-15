<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

namespace App\ExamplePackage\Entity;

use Kdyby;
use Nette;



/**
 * @Orm:MappedSuperclass()
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 */
class SharedFields extends Nette\Object
{

	/**
	 * @Orm:Id
	 * @Orm:Column(type="integer")
	 * @Orm:GeneratedValue
	 * @var integer
	 */
	protected $id;



	/**
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function &__get($name)
	{
		if (isset($this->$name)) {
			return $this->$name;
		}

		return parent::__get($name);
	}



	/**
	 * @param string $name
	 * @param mixed $value
	 *
	 * @return mixed|void
	 */
	public function __set($name, $value)
	{
		if (isset($this->$name)) {
			return $this->$name = $value;
		}

		return parent::__set($name, $value);
	}

}
