<?php

/**
 */
class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}



	/**
	 * @return FooControl
	 */
	protected function createComponentFoo()
	{
		$foo = new FooControl;
		$foo->setTemplateConfigurator($this->context->kdyby->templateConfigurator);
		return $foo;
	}

}
