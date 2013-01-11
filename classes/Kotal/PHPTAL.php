<?php

class Kotal_PHPTAL extends PHPTAL
{
	/**
	 * Overridden constructor, allowing a context to be passed in.
	 *
	 * @param mixed $path    Path, or FALSE to supply it later.
	 * @param mixed $context PHPTAL_Context, or NULL for default.
	 */
	public function __construct($path = FALSE, $context = NULL)
	{
		parent::__construct($path);

		if ($context !== NULL) {
			$this->setContext($context);
		}
	}

	/**
	 * Setter for the context.
	 *
	 * @param PHPTAL_Context $context New context.
	 *
	 * @return void
	 */
	public function setContext($context)
	{
		$this->_context = $context;
	}
}