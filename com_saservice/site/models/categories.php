<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');


class SaServiceModelCategories extends JModelItem
{
    public function getCategories() 
    {
        $db =& JFactory::getDBO();
        $query = "SELECT id, name FROM #__ss_categories ORDER BY name ASC";
        $db->setQuery($query);
        
        $result = $db->loadObjectList();
        
        return $result;
    }
    
    
    
    
    public function getMatch() 
    {
        $db =& JFactory::getDBO();
        $alpha = JRequest::getVar('alpha', '', 'get', 'word');
        
        $query = "SELECT id, name FROM #__ss_categories WHERE name LIKE '$alpha%' ORDER BY name ASC";
        $db->setQuery($query);
        
        $result = $db->loadObjectList();
        
        return $result;
    }
}
