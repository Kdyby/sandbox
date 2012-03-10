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
use Doctrine\ORM\Mapping as ORM;
use Kdyby;
use Nette;



/**
 * @ORM\Entity()
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 */
class Person extends Kdyby\Doctrine\Entities\IdentifiedEntity
{

	/**
	 * @var string
	 * @ORM\Column(type="string", nullable=TRUE)
	 */
	private $fullname;

	/**
	 * @var \DateTime
	 * @ORM\Column(type="date", nullable=TRUE)
	 */
	private $birthday;

	/**
	 * @var string
	 * @ORM\Column(type="string", nullable=TRUE)
	 */
	private $phone;

	/**
	 * @var string
	 * @ORM\Column(type="string", nullable=TRUE)
	 */
	private $email;

	/**
	 * @var \App\ExamplePackage\Entity\Address
	 * @ORM\ManyToOne(targetEntity="Address", fetch="EAGER")
	 * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
	 */
	private $address;

	/**
	 * @var string
	 * @ORM\Column(type="text", nullable=TRUE)
	 */
	private $note;



	/**
	 * @param string $fullname
	 */
	public function __construct($fullname = NULL)
	{
		$this->fullname = $fullname;
	}



	/**
	 * @param string $fullname
	 *
	 * @return \App\ExamplePackage\Entity\Person
	 */
	public function setFullname($fullname)
	{
		$this->fullname = $fullname;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getFullname()
	{
		return $this->fullname;
	}



	/**
	 * @param \Datetime|NULL $birthday
	 *
	 * @return \App\ExamplePackage\Entity\Person
	 */
	public function setBirthday(\Datetime $birthday = NULL)
	{
		$this->birthday = $birthday;
		return $this;
	}



	/**
	 * @return \Datetime|NULL
	 */
	public function getBirthday()
	{
		return $this->birthday ? clone $this->birthday : NULL;
	}



	/**
	 * @param string $phone
	 *
	 * @return \App\ExamplePackage\Entity\Person
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getPhone()
	{
		return $this->phone;
	}



	/**
	 * @param string $email
	 *
	 * @return \App\ExamplePackage\Entity\Person
	 */
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}



	/**
	 * @param \App\ExamplePackage\Entity\Address $address
	 *
	 * @return \App\ExamplePackage\Entity\Person
	 */
	public function setAddress(Address $address)
	{
		$this->address = $address;
		return $this;
	}



	/**
	 * @return \App\ExamplePackage\Entity\Address
	 */
	public function getAddress()
	{
		return $this->address;
	}



	/**
	 * @param string $note
	 *
	 * @return \App\ExamplePackage\Entity\Person
	 */
	public function setNote($note)
	{
		$this->note = $note;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getNote()
	{
		return $this->note;
	}

}
