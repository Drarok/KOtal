<?php
/**
 * KOtal view-model base class.
 *
 * @category  KOtal
 * @package   Base
 * @author    Mat Gadd <github@catchall.drarok.com>
 * @copyright 2013 Mat Gadd
 * @license   http://drarok.com/license
 */
abstract class Kotal_Kotal extends PHPTAL_Context
{
	/**
	 * Render this view model and return its markup.
	 *
	 * @param mixed $template String template name, or NULL for default.
	 *
	 * @return string
	 */
	public function render($template = NULL)
	{
		if ($template === NULL) {
			$template = explode('_', get_class($this));
			array_shift($template);
			$template = strtolower(implode('/', $template));
		}

		return View::factory($template)
			->setContext($this)
			->render();
	}

	/**
	 * Override the getter to allow methods to be called.
	 *
	 * @param string $name Name of the property being asked for.
	 *
	 * @return mixed
	 */
	public function __get($name)
	{
		if (method_exists($this, $name)) {
			return $this->$name();
		}

		return parent::__get($name);
	}
}