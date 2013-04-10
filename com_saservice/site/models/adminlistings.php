<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'listing.php');

class SaServiceModelAdminlistings extends JModelItem
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
    

    
    
    
    
    public function saveListingCategory($listingId, $categoryids) 
    {
        if ($listingId && is_array($categoryids)) {
            $query = "INSERT INTO #__ss_category_listing (listing_id, category_id) VALUES ";
            $flag = false;
            
            foreach ($categoryids as $categoryid) {
                $id = (int)$categoryid;
                
                if (!$flag) {
                    $query .= "({$listingId}, {$id})";
                    $flag = true;
                }
                else {
                    $query .= ", ({$listingId}, {$id})";
                }
            }
            
            $db =& JFactory::getDBO();
            $db->setQuery($query);
        
		    $result = $db->query();
            
            if (!$result) {
                JError::raiseWarning( 500, $db->getErrorMsg() );
            }
            
            return $result;
        }
        
        return false;
    }
    
    
    
    
    
    private function _buildQuery() {
        $query = "SELECT * FROM #__ss_listings ORDER BY id DESC";
        
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
    
    
    
    public function getListing($id = 0) {
        if ($id) {
            $table = $this->getTable();
            $table->load($id);
                
            return $table;
        }
        
        return false;
    }



    public function removeListing($listings) {   
        if (is_array($listings) && count($listings) > 0) {
            $ids = '(' . implode(",", $listings) . ')';
            
            $db =& JFactory::getDBO();
            $query = "DELETE FROM #__ss_listings WHERE id IN $ids";
            $query2 = "DELETE FROM #__ss_category_listing WHERE listing_id IN $ids";
            $db->setQuery($query);
            $result = $db->query();
            
            if ($result) {
                $db->setQuery($query2);
                $result = $db->query();
                
                return $result;
            }
                
            return false;
        }
        
        return false;
    }     
    
    
    
    
    
    public function addListing($arr = array()) {
        
        if (is_array($arr) && count($arr) > 0) {
            $table = $this->getTable();
            
            if (!$table->bind( $arr )) {
                JError::raiseWarning( 500, $table->getError() );
                return false;
            }
            if (!$table->store( $arr )) {
                JError::raiseWarning( 500, $table->getError() );
                return false;
            }
                
            return $table->id;
        }
        
        return false;
    }
    
    
    
    
    
    
    public function getListings() {
        $query = $this->_buildQuery();
        $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        
        return $this->_data;
    }
    
    
    
    
    
    
    public function getCategories() {
        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__ss_categories ORDER BY name ASC";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }
}

