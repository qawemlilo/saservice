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
        
        $params =& JComponentHelper::getParams( 'com_saservice' );
        $limit = $params->get('devotions_limit');
        
        $this->query = JRequest::getVar('q', '', 'GET');
        $this->pagination = $this->get('Pagination');

        $this->categories = $this->get('Categories');
        $this->listings = $this->get('Listings');
        
        $this->categoriesHTML = $this->createDropDown($categories);

		parent::display($tpl);
	}  
    
    
    
    function createDropDown ($categories) {
        $select = '<select name="parent_id" class="input-xlarge">';
        $select .= '<option value="0">Select parent category</option>';
        
        if (!(is_array($categories) && count($categories) > 0)) {
            return false;
        }
        
        foreach ($categories as $category) {
            $select .= '<option value=" ' . $category->id . ' ">' . $category->name . '</option>';   
        }
        
        $select .= '</select>';
        
        return $select;
    }
}
