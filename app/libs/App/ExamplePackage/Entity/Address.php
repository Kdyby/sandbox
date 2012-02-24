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
class Related extends SharedFields
{

	/**
	 * @Orm:Column(type="string")
	 * @var string
	 */
	protected $name;

	/**
	 * @Orm:ManyToOne(targetEntity="Root", inversedBy="children", cascade={"persist"})
	 * @var \App\ExamplePackage\Entity\Root
	 */
	protected $daddy;

	/**
	 * @Orm:ManyToMany(targetEntity="Root", mappedBy="buddies", cascade={"persist"})
	 * @var \App\ExamplePackage\Entity\Root[]
	 */
	protected $buddies;



	/**
	 * @param string $name
	 * @param \App\ExamplePackage\Entity\Root $daddy
	 */
	public function __construct($name = NULL, Root $daddy = NULL)
	{
		$this->name = $name;
		$this->daddy = $daddy;
		$this->buddies = new ArrayCollection();
	}



	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}



	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}



	/**
	 * @return \App\ExamplePackage\Entity\Root[]|\Doctrine\Common\Collections\ArrayCollection
	 */
	public function getBuddies()
	{
		return $this->buddies;
	}



	/**
	 * @param \App\ExamplePackage\Entity\Root $daddy
	 */
	public function setDaddy(Root $daddy)
	{
		$this->daddy = $daddy;
	}



	/**
	 * @return \App\ExamplePackage\Entity\Root
	 */
	public function getDaddy()
	{
		return $this->daddy;
	}

}
