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


class SaServiceViewAdmincategories extends JView
{
    // Overwriting JView display method
    function display($tpl = null) {
        $this->layout = JRequest::getVar('layout', '', 'GET', 'string');
        $this->category = false;
        
        if(!isAllowed()) {
            $application = JFactory::getApplication();
            $application->redirect('index.php?option=com_users&view=login', 'Restricted area, login required.');
        }
        
        if ($this->layout == 'new' || $this->layout == 'edit') {
            $this->categories = $this->get('FormCategories');
           
        
            if ($this->layout == 'edit') {
                $this->category = $this->get('Category');

                $this->categoriesHTML = $this->createDropDown($this->categories, $this->category->parent_id);
            }
            else {
                $this->categoriesHTML = $this->createDropDown($this->categories);
            }
        }
        else {
            $this->categories = $this->get('Categories');
            $this->pagination = $this->get('Pagination');
        }
        
        parent::display($tpl);
	}  
    
    
    
    function createDropDown ($categories, $id = false) {
        $select = '<select name="parent_id" class="input-xlarge">';
        $select .= '<option value="0">Select parent category</option>';
        
        if (!(is_array($categories) && count($categories) > 0)) {
            return false;
        }
        
        foreach ($categories as $category) {
            if ($id && ($id == $category->id)) {
                $select .= '<option selected="selected" value="' . $category->id . '">' . $category->name . '</option>'; 
            }
            else {
                $select .= '<option value="' . $category->id . '">' . $category->name . '</option>';
            }  
        }
        
        $select .= '</select>';
        
        return $select;
    }
}
