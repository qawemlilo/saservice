<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');
jimport('joomla.filesystem.file');

/**
 * HTML View class for the HelloWorld Component
 */
class SaServiceViewListing extends JView
{
    // Overwriting JView display method
    function display($tpl = null) {
        $this->listing = $this->get('Listing');
        $cats = $this->get('Categories');
        
        
        $this->tags = $this->createTags($cats);
        $this->slider = $this->makeShowcase();
        
        parent::display($tpl);
    }
	


    function createTags($categories) {
        $p = '<p><i class="icon-tags"></i> ';
        
        if (is_array($categories)) {
            foreach ($categories as $category) {
                $p .= '<span class="label  label-warning">' . $category->name . '</span> ';
            }
        }
        
        $p .= '</p>';
        
        return $p;
    }
    
    
    
    
    function makeShowcase() {
        $id = JRequest::getInt('id');
        $path = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'showcase';
        $html = '<div id="myCarousel" class="carousel slide">';
        
        $html .= '<ol class="carousel-indicators">';
        $html .= '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
        $html .= '<li data-target="#myCarousel" data-slide-to="1"></li>';
        $html .= '<li data-target="#myCarousel" data-slide-to="2"></li>';
        $html .= '</ol>';
        $html .= '<div class="carousel-inner">';

        if (!JFolder::exists($path)) {
            JError::raiseWarning( 500, "Listing folder does not exist");
            return false;
        }
        
        $files = JFolder::files($path);
        
        if (empty($files)) {
            JError::raiseWarning( 500, "Listing folder is empty");
            return false;
        }
        
        $ctive = false;
        
        foreach ($files as $file) {
             if (!$ctive) {
                 $html .= '<div class="active item">';
                 $ctive = true;
             }
             else {
                 $html .= '<div class="item">';    
             }
             $html .= '<img alt="" style="height: 250px" src="' . JURI::base() . 'media/com_saservice/listings/listing_' . $id . '/showcase/'. $file . '" />';
             $html .= '</div>';
        }
        
        $html .= '</div>';
        
        $html .= '<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>';
        $html .= '<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>';  
        $html .= '</div>';
        
        return $html;
    }
    
    
    
    
    function createLists($csv) {
        $listHtml = "";
        if ($csv) {
            $listArray = explode(',', $this->listing->services_offered);
            
            if (count($listArray) > 0) {
                $listHtml = '<li>' . implode('</li><li>', $listArray) . '</li>';
            }
        }
        
        return $listHtml;
    }
}
