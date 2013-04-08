<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');



class SaServiceViewAdminlistings extends JView
{
    // Overwriting JView display method
    function display($tpl = null) {
        $this->layout = JRequest::getVar('layout', '', 'GET');
        
        if ($this->layout == 'new') {
            $limit = $params->get('devotions_limit');
            $this->categories = $this->get('Categories');
            
            $this->categoriesHTML = $this->createSelects($this->categories);
        }
        else {
            $this->listings = $this->get('Listings');
            $this->pagination = $this->get('Pagination');
        }
        
        parent::display($tpl);
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
