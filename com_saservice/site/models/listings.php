<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');


/*
SELECT *
FROM bzhpg_ss_listings
INNER JOIN bzhpg_ss_category_listing ON bzhpg_ss_listings.id = bzhpg_ss_category_listing.listing_id
INNER JOIN bzhpg_ss_categories ON bzhpg_ss_category_listing.category_id = bzhpg_ss_categories.id
WHERE bzhpg_ss_listings.province = 'KwaZulu-Natal'
AND bzhpg_ss_categories.name = 'Website Designers';
*/


class SaServiceModelListings extends JModelItem
{
    private $_total = null;    
    private $_pagination = null;   
    
    
    function __construct() {
        parent::__construct();
 
        $mainframe = JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', 24, 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
        
        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }
    
    
    
    
    private function _buildQuery($service = '', $province = '', $locality = '', $sublocality = '') {
    
        $query = "SELECT listings.id, listings.name, listings.locality ";
        $query .= "FROM #__ss_listings listings ";
        $query .= "INNER JOIN #__ss_category_listing catlist ON listings.id = catlist.listing_id ";
        $query .= "INNER JOIN #__ss_categories categories ON catlist.category_id = categories.id ";
        $query .= "WHERE categories.name = '$service' ";
        
        if ($sublocality) {
            $query .= "AND ((listings.province = '$province' AND listings.sublocality = '$sublocality') OR (listings.province = '$province' AND listings.locality = '$locality') OR listings.province = '$province')";
        }
        elseif ($locality) {
            $query .= "AND ((listings.province = '$province' AND listings.locality = '$locality') OR listings.province = '$province')";
        }
        else {
            $query .= "AND listings.province = '$province'";
        }
        
        return $query;        
    }
    
    
    
    
    private function getTotal() {
        $service = JRequest::getVar('service', '', 'post', 'string');
        $province = JRequest::getVar('administrative_area_level_1', '', 'post', 'string');
        $locality = JRequest::getVar('locality', '', 'post', 'string');
        $sublocality = JRequest::getVar('sublocality', '', 'post', 'string');
        
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
 	        $this->_total = $this->_buildQuery($service, $province, $locality, $sublocality);	
 	    }
        return $this->_total;
    }
    
    
    
    
    public function getSearch() {
        $service = JRequest::getVar('service', '', 'post', 'string');
        $province = JRequest::getVar('administrative_area_level_1', '', 'post', 'string');
        $locality = JRequest::getVar('locality', '', 'post', 'string');
        $sublocality = JRequest::getVar('sublocality', '', 'post', 'string');
        
        if (!$province || !$service) {
            return false;
        }
        
        $db = JFactory::getDBO();
        
        $query = $this->_buildQuery($service, $province, $locality, $sublocality);

        
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        if (!$result) {
            if ($error = $db->getErrorMsg()) {
                JError::raiseWarning( 500, $error);
            }
        }
        
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

