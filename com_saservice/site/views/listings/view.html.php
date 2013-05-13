<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component
 */
class SaServiceViewListings extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $this->listings = $this->get('Search');
        $this->pagination = $this->get('Pagination');

        $this->service = JRequest::getVar('service');
        $this->location = JRequest::getVar('formatted_address');
        
		parent::display($tpl);
	}
    
    
    
    function listResults($results) {
        $counter = 0;
        $list = '';
        
        foreach ($results as $listing) {
            if ($counter > 2) {
                $list .= '</ul>';
                $counter = 0;
            }
            if ($counter == 0) {
                $list .= '<ul class="thumbnails" style="padding-left: 0px; margin-bottom: 0px">';
            }

            $list .= '<li class="span4" style="margin-bottom: 10px">';
            $list .= '<a href="' . JRoute::_('index.php?option=com_saservice&view=listing&id=' . $listing->id) . '" class="thumbnail">';
            $list .= '<img src="' . JURI::base() . 'media/com_saservice/listings/listing_' . $listing->id . '/logo.png" title="' . $listing->name . '" alt="' .$listing->name . '">';
            $list .= '<br><i class="icon-map-marker"> </i> ' . $listing->locality . '</a></li>';

            $counter++;            
        }
        
        echo $list;
    }
}
