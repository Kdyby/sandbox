<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */

namespace App\ExamplePackage\Control;

use Kdyby;
use Kdyby\Application\UI\Presenter;
use Kdyby\Components\Grinder\SelectedResults;
use Nette;
use Nette\Forms\Container;
use Nette\Forms\Controls\SubmitButton;



/**
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 */
class PeopleGrid extends Kdyby\Components\Grinder\Grid
{

	/**
	 * @param \Kdyby\Doctrine\Registry $doctrine
	 * @return \Kdyby\Doctrine\QueryBuilder
	 */
	protected function createQuery(Kdyby\Doctrine\Registry $doctrine)
	{
		return $doctrine->getDao('App\ExamplePackage\Entity\Person')
			->createQueryBuilder('p')
			->addSelect('a')
			->leftJoin('p.address', 'a');
	}



	/**
	 * @param \Kdyby\Application\UI\Presenter $presenter
	 * @param \Nette\Forms\Container $container
	 */
	protected function configure(Presenter $presenter, Container $container)
	{
		$this->itemsPerPage = 10;
		$this->setSorting('fullname', 'asc');

		$this->addCheckColumn('select');
		$this->getColumn('birthday')->dateTimeFormat = 'j.n.Y';

		$container->addSubmit('delete', 'Smazat')
			->onClick[] = callback($this, 'handleDelete');

		$this->editable = array('fullname', 'phone', 'email', 'note', 'birthday');
	}



	/**
	 * @param \Kdyby\Components\Grinder\SelectedResults $result
	 */
	public function handleDelete(SelectedResults $result)
	{
		$result->delete();
		$this->redirect('this');
	}

}
