<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

// Function checks if the user has permission to view this page
function isAllowed($permission = 3) {
    $user =& JFactory::getUser();
    $isAllowed = in_array($permission, $user->authorisedLevels());
    
	return $isAllowed;
}


class SaServiceViewAdminlistings extends JView
{
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
