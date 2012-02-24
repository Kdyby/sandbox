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
class Root extends SharedFields
{

	/**
	 * @Orm:Column(type="string")
	 */
	protected $name;

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
		$this->name = $name;
		$this->children = new ArrayCollection();
		$this->buddies = new ArrayCollection();
	}



	/**
	 * @param $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}



	/**
	 * @return null|string
	 */
	public function getName()
	{
		return $this->name;
	}



	/**
	 * @return \App\ExamplePackage\Entity\Related[]|\Doctrine\Common\Collections\ArrayCollection
	 */
	public function getBuddies()
	{
		return $this->buddies;
	}



	/**
	 * @return \App\ExamplePackage\Entity\Related[]|\Doctrine\Common\Collections\ArrayCollection
	 */
	public function getChildren()
	{
		return $this->children;
	}



	/**
	 * @param \App\ExamplePackage\Entity\Related $daddy
	 */
	public function setDaddy(Related $daddy)
	{
		$this->daddy = $daddy;
	}



	/**
	 * @return \App\ExamplePackage\Entity\Related
	 */
	public function getDaddy()
	{
		return $this->daddy;
	}

}
