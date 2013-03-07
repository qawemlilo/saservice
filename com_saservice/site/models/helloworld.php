<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');


class SaServiceModelHelloWorld extends JModelItem
{
	/**
	 * @var string msg
	 */
	protected $msg;

	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	public function getMsg() 
	{
		if (!isset($this->msg)) 
		{
			$id = JRequest::getInt('id');
			switch ($id) 
			{
			case 2:
				$this->msg = 'Good bye World!';
			break;
			default:
			case 1:
				$this->msg = 'Hello World!';
			break;
			}
		}
		return $this->msg;
	}
}
