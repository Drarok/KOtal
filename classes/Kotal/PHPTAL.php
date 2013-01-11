<?php

class Kotal_PHPTAL extends PHPTAL
{
	public function __construct($path = FALSE, $context = NULL)
	{
		parent::__construct($path);

		if ($context !== NULL) {
			$this->setContext($context);
		}
	}

	public function setContext($context)
	{
		$this->_context = $context;
	}
}