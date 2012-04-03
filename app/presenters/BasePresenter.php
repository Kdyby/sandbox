<?php

/**
 */
abstract class BasePresenter extends Kdyby\Application\UI\Presenter
{

	/**
	 * @return Kdyby\Components\Header\HeaderControl
	 */
	protected function createComponentHead()
	{
		return $this->getContext()->header->control;
	}

}
