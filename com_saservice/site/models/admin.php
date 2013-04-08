<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'listing.php');

class SaServiceModelAdmin extends JModelItem
{
    private $_total = null;    
    private $_pagination = null;   
    
    
    function __construct() {
        parent::__construct();
 
        $mainframe = JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', 10, 'int');
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
    
    
    
    
    public function getListings() {
        $db =& JFactory::getDBO();
        $query = $this->_buildQuery('list');
        
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }    
    
    
    
    
    
    public function addListing($arr = array()) {
        
        if (is_array($arr) && count($arr) > 0) {
            $table = $this->getTable();
            
            if (!$table->bind( $arr )) {
                return JError::raiseWarning( 500, $table->getError() );
            }
            if (!$table->store( $arr )) {
                return JError::raiseWarning( 500, $table->getError() );
            }
                
            return $table->id;
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
    
    
    
    public function saveListngCategory($listingId, $categoryId) 
    {
        $db =& JFactory::getDBO();
		$query = "INSERT INTO #__category_listing (listing_id, category_id) VALUES($listingId, $categoryId)";
        $db->setQuery($query);
        
		$result = $db->query();
            
        return $result;
    }
    
    
    
    private function _buildQuery($q) {
        $query = '';
        
        if ($q == 'cat') {
            $query = "SELECT * FROM #__ss_categories ORDER BY name ASC";
        }
        if ($q == 'list') {
            $query = "SELECT * FROM #__ss_listings ORDER BY id DESC";
        }
        
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
            $query = $this->_buildQuery('cat');
 	        $this->_total = $this->_getListCount($query);	
 	    }
        return $this->_total;
    }
    
    
    
    
    public function getAdminCategories() {
        $query = $this->_buildQuery('cat');
        
        $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));

		return $this->_data;
    }
    
    
    
    
    public function getCategories() {
        $db =& JFactory::getDBO();
        $query = $this->_buildQuery('cat');
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }
}
