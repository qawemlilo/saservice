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
    public function getSearch() {
    
        $province = JRequest::getVar('administrative_area_level_1', '', 'post', 'string');
        $locality = JRequest::getVar('locality', '', 'post', 'string');
        $sublocality = JRequest::getVar('sublocality', '', 'post', 'string');
        $service = JRequest::getVar('service', '', 'post', 'string');
        
        if (!$province || !$service) {
            return false;
        }
        
        $db = JFactory::getDBO();
        
        $query = "SELECT bzhpg_ss_listings.id, bzhpg_ss_listings.name, bzhpg_ss_listings.locality ";
        $query .= "FROM bzhpg_ss_listings ";
        $query .= "INNER JOIN bzhpg_ss_category_listing ON bzhpg_ss_listings.id = bzhpg_ss_category_listing.listing_id ";
        $query .= "INNER JOIN bzhpg_ss_categories ON bzhpg_ss_category_listing.category_id = bzhpg_ss_categories.id ";
        $query .= "WHERE bzhpg_ss_listings.province = '$province' ";
        $query .= "AND bzhpg_ss_categories.name = '$service'";

        
        $db->setQuery($query);
        $result = $db->loadObjectList();
        
        if (!$result) {
            if ($error = $db->getErrorMsg()) {
                JError::raiseWarning( 500, $error);
            }
        }
        
        return $result;
    }
}

