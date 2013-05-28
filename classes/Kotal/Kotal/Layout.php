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
	 * Variables to pass into the layout.
	 *
	 * @var array
	 */
	protected $_data = array(
		'title'   => '',
		'styles'  => array(),
		'scripts' => array(),
	);

	/**
	 * Add an extra stylesheet by name.
	 *
	 * Note that you must include the full path to your stylesheet, e.g.
	 * $this->addStyle('/styles/extra.css');
	 *
	 * @param string $style Extra stylesheet to load into the layout.
	 */
	public function addStyle($style)
	{
		$this->_data['styles'][] = $style;
		return $this;
	}

	/**
	 * Add an extra script by name.
	 *
	 * Note that you must include the full path to your script, e.g.
	 * $this->addStyle('/scripts/extra.js');
	 *
	 * @param string $script Extra script to load into the layout.
	 */
	public function addScript($script)
	{
		$this->_data['scripts'][] = $script;
		return $this;
	}

	/**
	 * Setter for layout variables.
	 *
	 * @param string $key   Name of the variable to set.
	 * @param mixed  $value Value of the variable.
	 *
	 * @return Kotal_Layout
	 * @chainable
	 */
	public function set($key, $value)
	{
		$this->_data[$key] = $value;
		return $this;
	}

	public function setLayout($layout)
	{
		$this->_layout = $layout;
		return $this;
	}

	/**
	 * Render this view model, wrapped in a layout, and return its markup.
	 *
	 * @param mixed $template String template name, or NULL for default.
	 *
	 * @return string
	 */
	public function render($template = NULL)
	{
		// This method uses PHPTAL directly. Possibly doesn't need to.
		$tal = new Kotal_PHPTAL(Kohana::find_file('views', 'layouts/' . $this->_layout, 'xhtml'));
		foreach ($this->_data as $key => $value) {
			$tal->$key = $value;
		}
		$tal->body = parent::render($template);
		return $tal->execute();
	}
}
