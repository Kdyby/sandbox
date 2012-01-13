<?php

/**
 */
abstract class BasePresenter extends Kdyby\Application\UI\Presenter
{

	public function templatePrepareFilters($template)
	{
		parent::templatePrepareFilters($template);
		$compiler = $this->templateConfigurator->getLatte()->getCompiler();

		Kdyby\Components\Header\HeadMacro::install($compiler);
	}



	/**
	 * @return Kdyby\Components\Header\HeaderControl
	 */
	protected function createComponentHead()
	{
		return $this->getContext()->cms_headerControl;
	}

}
