<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');


function isAllowed($chech_perms = 3) {
    $isAllowed = false;
    $user =& JFactory::getUser();
    $user_perms = $user->authorisedLevels();
	
    if (is_int($chech_perms)) {
        foreach($user_perms as $permission) {
	        if($permission == $chech_perms) {
                $isAllowed = true;
            }
        }	
	}
    
	return $isAllowed;
}


class SaServiceViewAdminlistings extends JView
{
    // Overwriting JView display method
    function display($tpl = null) {
        $this->layout = JRequest::getVar('layout', '', 'GET');
        $this->listing = false;

        if(!isAllowed()) {
            $application = JFactory::getApplication();
            $application->redirect('index.php?option=com_users&view=login', 'Restricted area, login required.');
        }
        
        if ($this->layout == 'new' || $this->layout == 'edit') {
            $this->categories = $this->get('Categories'); 
            
            if ($this->layout == 'new') {
                $this->categoriesHTML = $this->createSelects($this->categories, false);
            }
            elseif ($this->layout == 'edit') {
                $catlistArr = $this->get('ListingCats');
                $this->listing = $this->get('Listing');
                
                $this->categoriesHTML = $this->createSelects($this->categories, $catlistArr);
            }
        }
        else {
            $this->listings = $this->get('Listings');
            $this->pagination = $this->get('Pagination');
        }
        
        parent::display($tpl);
    }
    
    
    
    
    function createSelects($categories, $flag) {
        $select = '<select name="categories[]" class="input-xlarge" multiple size="12" >';
        $select .= '<option value="">Select categories</option>';
        
        if (!(is_array($categories) && count($categories) > 0)) {
            return false;
        }
        
        foreach ($categories as $category) {
            if ($flag) {
                if (in_array($category->id, $flag)) {
                    $select .= '<option selected="selected" value="' . $category->id . '">' . $category->name . '</option>';
                }
                else {
                    $select .= '<option value="' . $category->id . '">' . $category->name . '</option>';
                }
            }
            else {
                $select .= '<option value="' . $category->id . '">' . $category->name . '</option>';
            }
        }
        
        $select .= '</select>';
        
        return $select;
    }
}
