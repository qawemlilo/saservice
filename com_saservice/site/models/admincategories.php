<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
require_once(dirname(__FILE__) . DS . 'tables' . DS . 'category.php');

class SaServiceModelAdmincategories extends JModelItem
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
    
    
    
    
    
    public function getTable($type = 'Category', $prefix = 'SaServiceTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    
    
  
  
    private function _buildQuery() {
        $query = "SELECT * FROM #__ss_categories ORDER BY name ASC";
        
        return $query;        
    }
    
    
    
    
    private function getTotal() {
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
 	        $this->_total = $this->_getListCount($query);	
 	    }
        return $this->_total;
    } 

        
        
    
    
    public function getCategory() {
        $id = JRequest::getInt('id');
        $table =& $this->getTable();
        
        if (!$table->load($id)) {
            JError::raiseWarning( 500, $table->getError() );
        }
        
        return $table;
    }
    



    public function removeCategory($categories) {   
        if (is_array($categories) && count($categories) > 0) {
            $ids = '(' . implode(",", $categories) . ')';
            
            $db =& JFactory::getDBO();
            $query = "DELETE FROM #__ss_categories WHERE id IN $ids";
            $query2 = "DELETE FROM #__ss_category_listing WHERE category_id IN $ids";
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
    
    
    
    
    
    public function addCategory($arr) {
        
        if (is_array($arr) && count($arr) > 0) {
            $table =& $this->getTable();
            
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
    
    
    
    public function updateCategory($id, $arr) {
        $table =& $this->getTable();
            
        if (!$table->load($id)) {
            JError::raiseWarning( 500, $table->getError() );
            return false;
        }
        
        if (!$table->bind($arr)) {
            JError::raiseWarning( 500, $table->getError() );
            return false;
        }
        
        if (!$table->store($arr)) {
            JError::raiseWarning( 500, $table->getError() );
            return false;
        }

        
        return true;
    }
    
    
    
    
    
    public function getCategories() {
        $query = $this->_buildQuery();
        $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        
        return $this->_data;
    }
    
    
    
    
    
    public function getFormCategories() {
        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__ss_categories ORDER BY name ASC";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        return $result;
    }
    
    
    
    
    public function getListingCats() {
        $id = JRequest::getVar('id', '', 'GET', 'int');
        
        $db =& JFactory::getDBO();
        $query = "SELECT category_id FROM #__ss_category_listing WHERE listing_id=$id";
        $db->setQuery($query);
        $result = $db->loadArray();
        
        return $result;
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
}
