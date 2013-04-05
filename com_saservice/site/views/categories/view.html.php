<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');



class SaServiceViewCategories extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
        $alpha = JRequest::getVar('alpha', '', 'get', 'word');
        
        $this->categories = false;
        $this->match = false;
        $this->alpha = $alpha;
        
        if ($alpha) {
            $this->match = $this->get('Match');             
        } else {
            $this->categories = $this->get('Categories');   
        }
        
		parent::display($tpl);
	}
}
