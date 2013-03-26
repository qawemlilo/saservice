<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');


class SaServiceModelAdmin extends JModelItem
{
    public function getTable($type = 'Listing', $prefix = 'SaServiceTable', $config = array()) 
    {
        return JTable::getInstance($type, $prefix, $config);
    }

        
        
    
    
    public function getListing($id = 0) 
    {
        if ($id) {
            $table = $this->getTable();
            $table->load($id);
                
            return $table;
        }
        
        return false;
    }
    
    
    
    
    public function getCategory($id = 0) 
    {
        if ($id) {
            $table = $this->getTable('Category');
            $table->load($id);
                
            return $table;
        }
        
        return false;
    }
    
    
    
    
    public function getCategories() 
    {
	    $db =& JFactory::getDBO();
		$query = "SELECT * FROM #__ss_categories";
        $db->setQuery($query);
        
		$data = $db->loadObjectList();

		return $data;
    }
}
