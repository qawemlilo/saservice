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
        
        //$params =& JComponentHelper::getParams( 'com_saservice' );
        $limit = $params->get('devotions_limit');
        
        $this->query = JRequest::getVar('q', '', 'GET');
        $this->pagination = $this->get('Pagination');
        
        if ($this->layout == 'new') {
            $this->categories = $this->get('Categories');
            
            if ($this->query == 'categories') {
                $this->categoriesHTML = $this->createDropDown($this->categories); 
            }
            else {
                $this->categoriesHTML = $this->createSelects($this->categories);
            }
        }
        elseif($this->layout == 'categories') {
            $this->categories = $this->get('AdminCategories');
            $this->categoriesHTML = $this->createDropDown($this->categories);
        }
        
        $this->listings = $this->get('Listings');
        
        

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
    
    
    
    
    function createSelects($categories) {
        $select = '<select name="categories" class="input-xlarge" multiple size="12" >';
        $select .= '<option value="">Select categories</option>';
        
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
