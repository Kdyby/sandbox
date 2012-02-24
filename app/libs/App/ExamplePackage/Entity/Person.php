<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

namespace App\ExamplePackage\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Kdyby;
use Nette;



/**
 * @Orm:Entity()
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 */
class Person extends Kdyby\Doctrine\Entities\IdentifiedEntity
{

	/**
	 * @Orm:Column(type="string")
	 */
	protected $fullname;

	/**
	 * @Orm:ManyToOne(targetEntity="Related", cascade={"persist"})
	 * @var \App\ExamplePackage\Entity\Related
	 */
	protected $daddy;

	/**
	 * @Orm:OneToMany(targetEntity="Related", mappedBy="daddy", cascade={"persist"})
	 * @var \App\ExamplePackage\Entity\Related[]
	 */
	protected $children;

	/**
	 * @Orm:ManyToMany(targetEntity="Related", inversedBy="buddies", cascade={"persist"})
	 * @var \App\ExamplePackage\Entity\Related[]
	 */
	protected $buddies;



	/**
	 * @param string $name
	 */
	public function __construct($name = NULL)
	{
		$this->fullname = $name;
		$this->children = new ArrayCollection();
		$this->buddies = new ArrayCollection();
	}



	/**
	 * @param $name
	 */
	public function setFullname($name)
	{
		$this->fullname = $name;
	}



	/**
	 * @return null|string
	 */
	public function getFullname()
	{
		return $this->fullname;
	}

}
