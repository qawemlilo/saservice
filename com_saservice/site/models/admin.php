<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');


class SaServiceModelAdmin extends JModelItem
{
    private $_total = null;    
    private $_pagination = null;   
    
    
    function __construct() {
        parent::__construct();
 
        $mainframe = JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', 5, 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
        
        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }
    
    
    
    
    
    public function getTable($type = 'Listing', $prefix = 'SaServiceTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

        
        
    
    
    public function getListing($id = 0) {
        if ($id) {
            $table = $this->getTable();
            $table->load($id);
                
            return $table;
        }
        
        return false;
    }
    
    
    
    
    public function getCategory($id = 0) {
        if ($id) {
            $table =& $this->getTable('Category');
            $table->load($id);
                
            return $table;
        }
        
        return false;
    }
    
    
    public function addCategory($name, $image = '', $parent_id = 0) 
    {
        if ($name) {
	        $db =& JFactory::getDBO();
		    $query = "INSERT INTO #__ss_categories (name, image, parent_id) VALUES('$name', '$image', $parent_id)";
            $db->setQuery($query);
        
		    $result = $db->query();
            
            return $result;
        }
        
        return false;
    }
    
    
    
    private function _buildQuery() {
        $query = "SELECT * FROM #__ss_categories ORDER BY name ASC";
        
        return $query;        
    }
    
    
    
    public function getPagination() {
 	    $total = $this->getTotal();
 	    
        // Load the content if it doesn't already exist
 	    if (empty($this->_pagination)) {
 	        jimport('joomla.html.pagination');
 	        $this->_pagination = new JPagination($total, $this->getState('limitstart'), $this->getState('limit') );
        }
 	
        return $this->_pagination;
    }
    
    
    
    private function getTotal() {
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
 	        $this->_total = $this->_getListCount($query);	
 	    }
        return $this->_total;
    }
    
    
    
    
    public function getCategories() {
        $query = $this->_buildQuery();
        
        $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));

		return $this->_data;
    }
}
