<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component
 */
class SaServiceViewListings extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $this->listings = $this->get('Search');

        $this->service = JRequest::getVar('service');
        
		parent::display($tpl);
	}
}