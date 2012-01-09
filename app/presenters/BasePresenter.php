<?php

/**
 */
abstract class BasePresenter extends Kdyby\Application\UI\Presenter
{

	public function templatePrepareFilters($template)
	{
		parent::templatePrepareFilters($template);
		Kdyby\Components\Header\HeadMacro::install($this->templateConfigurator->getLatteParser());
	}



	/**
	 * @return Kdyby\Components\Header\HeaderControl
	 */
	protected function createComponentHead()
	{
		return $this->getContext()->cms_headerControl;
	}

}
