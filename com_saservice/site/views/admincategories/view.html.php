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


class SaServiceViewAdmincategories extends JView
{
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
