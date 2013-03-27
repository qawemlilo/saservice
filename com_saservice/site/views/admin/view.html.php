<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');



class SaServiceViewAdmin extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
		// Assign data to the view
		$this->layout = JRequest::getVar('layout', '', 'GET');

		parent::display($tpl);
	}
}
