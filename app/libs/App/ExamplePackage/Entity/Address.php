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
 * @Orm:Entity()
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 */
class Address extends Kdyby\Doctrine\Entities\IdentifiedEntity
{

	/**
	 * @var string
	 * @Orm:Column(type="string", nullable=TRUE)
	 */
	private $street;

	/**
	 * @var integer
	 * @Orm:Column(type="integer", nullable=TRUE)
	 */
	private $number;

	/**
	 * @var string
	 * @Orm:Column(type="string", nullable=TRUE)
	 */
	private $city;

	/**
	 * @var integer
	 * @Orm:Column(type="integer", nullable=TRUE)
	 */
	private $zip;



	/**
	 * @param string $street
	 * @param integer $number
	 * @param string $city
	 * @param integer $zip
	 */
	public function __construct($street = NULL, $number = NULL, $city = NULL, $zip = NULL)
	{
		$this->street = $street;
		$this->number = $number;
		$this->city = $city;
		$this->zip = $zip;
	}



	/**
	 * @param string $street
	 *
	 * @return Address
	 */
	public function setStreet($street)
	{
		$this->street = $street;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getStreet()
	{
		return $this->street;
	}



	/**
	 * @param integer $number
	 *
	 * @return Address
	 */
	public function setNumber($number)
	{
		$this->number = $number;
		return $this;
	}



	/**
	 * @return integer
	 */
	public function getNumber()
	{
		return $this->number;
	}



	/**
	 * @param string $city
	 *
	 * @return Address
	 */
	public function setCity($city)
	{
		$this->city = $city;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getCity()
	{
		return $this->city;
	}



	/**
	 * @param integer $zip
	 *
	 * @return Address
	 */
	public function setZip($zip)
	{
		$this->zip = $zip;
		return $this;
	}



	/**
	 * @return integer
	 */
	public function getZip()
	{
		return $this->zip;
	}



	/**
	 * @param string $format
	 *
	 * @return string
	 */
	public function format($format = '%street% %number%, %city% %zip%')
	{
		return trim(strtr($format, array(
			'%street%' => $this->street,
			'%number%' => $this->number ?: NULL,
			'%city%' => $this->city,
			'%zip%' => $this->zip ? : NULL,
		)), ', ');
	}



	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->format();
	}

}
