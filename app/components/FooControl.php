<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2011 Filip Procházka (filip.prochazka@kdyby.org)
 *
 * @license http://www.kdyby.org/license
 */



/**
 * @author Filip Procházka <filip.prochazka@kdyby.org>
 */
class FooControl extends Kdyby\Application\UI\Control
{

	public function render()
	{
		$this->template->render();
	}

}
