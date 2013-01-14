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
	/**
	 * Layout to use when rendering.
	 *
	 * @var string
	 */
	protected $_layout = 'default';

	/**
	 * Page title, put into the <title> element.
	 *
	 * @var string
	 */
	protected $_title = '';

	/**
	 * Render this view model, wrapped in a payout, and return its markup.
	 *
	 * @param mixed $template String template name, or NULL for default.
	 *
	 * @return string
	 */
	public function render($template = NULL)
	{
		// This method uses PHPTAL directly. Possibly doesn't need to.
		$tal = new Kotal_PHPTAL(Kohana::find_file('views', 'layouts/' . $this->_layout, 'xhtml'));
		$tal->title = $this->_title;
		$tal->body = parent::render($template);
		return '<!DOCTYPE html>' . $tal->execute();
	}
}