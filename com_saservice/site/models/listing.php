<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'listing.php');


class SaServiceModelListing extends JModelItem
{
    public function getTable($type = 'Listing', $prefix = 'SaServiceTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

        
        
        
    public function getListing() {
        $id = JRequest::getInt('id');
        $table =& $this->getTable();
        
        if (!$table->load($id)) {
            JError::raiseWarning( 500, $table->getError() );
        }
        
        return $table;
    }
    
    
    
    public function getCategories() {
        $id = JRequest::getInt('id');
        
        $db =& JFactory::getDBO();
        $query = "SELECT id, name FROM #__ss_categories WHERE id IN (SELECT category_id FROM #__ss_category_listing WHERE listing_id=$id)";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }
}
