<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');


class SaServiceModelListing extends JModelItem
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
}
