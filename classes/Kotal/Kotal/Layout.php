<?php
/**
 * KOtal view-model base class, with support for layouts.
 *
 * @category  KOtal
 * @package   Base
 * @author    Mat Gadd <github@catchall.drarok.com>
 * @copyright 2013 Mat Gadd
 * @license   http://drarok.com/license
 */
class Kotal_Kotal_Layout extends Kotal
{
	protected $_layout = 'default';

	/**
	 * Render this view model, wrapped in a payout, and return its markup.
	 *
	 * @param mixed $template String template name, or NULL for default.
	 *
	 * @return string
	 */
	public function render($template = NULL)
	{
		$layout = View::factory('layouts/' . $this->_layout);
		$layout->body = parent::render($template);
		return $layout->render();
	}
}