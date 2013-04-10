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
}
