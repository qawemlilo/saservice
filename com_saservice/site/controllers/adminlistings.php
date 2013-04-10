<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class SaServiceControllerAdminlistings extends JController
{
    private $refer;
    private $application;
    
    
    public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true)) {
        return parent::getModel($name, $prefix, array('ignore_request' => false));
    }
    
    
    
    public function remove () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('adminlistings');
        $listings = JRequest::getVar('listings', null, 'post', 'array');
        
        if (is_array($listings) && !empty($listings) && count($listings) > 0) {
            if (!$model->removeListing($listings)) {
                $application->redirect($refer, 'Error! Failed to delete Listing(s)', 'error');
            }
            else {
                $application->redirect($refer, 'Listing(s) successfully deleted!', 'success');
            }
        }
        else {
            $application->redirect($refer, 'Error! No listings were selected', 'error');
        }
    }
    
    
    
    
    public function add () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $this->application =& JFactory::getApplication();
        $this->refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('adminlistings');
        $form = array();
        $slides = array();
        $categories = array();
        
        // General Info
        $form['name'] = JRequest::getVar('service_provider', '', 'post', 'string');
        $form['email'] = JRequest::getVar('email', '', 'post', 'string');
        $form['phone'] = JRequest::getVar('phone', '', 'post', 'int');
        $form['cell'] = JRequest::getVar('cell', '', 'post', 'int');
        $form['fax'] = JRequest::getVar('fax', '', 'post', 'int');
        
        // Social Pages
        $form['twitter'] = JRequest::getVar('twitter', '', 'post', 'string');
        $form['facebook'] = JRequest::getVar('facebook', '', 'post', 'string');
        
        // Location Info
        $form['province'] = JRequest::getVar('administrative_area_level_1', '', 'post', 'string');
        $form['locality'] = JRequest::getVar('locality', '', 'post', 'string');
        $form['sublocality'] = JRequest::getVar('sublocality', '', 'post', 'string');
        $form['lng'] = JRequest::getVar('lng', '', 'post', 'string');
        $form['lat'] = JRequest::getVar('lat', '', 'post', 'string');
        $form['formatted_address'] = JRequest::getVar('formatted_address', '', 'post', 'string');
        
        
        
        // Business Info
        $form['slogan'] = JRequest::getVar('slogan', '', 'post', 'string');
        $categories = JRequest::getVar('categories', null, 'post', 'array');
        $form['services_offered'] = JRequest::getVar('services', '', 'post', 'string');
        $form['aboutus'] = JRequest::getVar('aboutus', '', 'post', 'string');       
        
        $logo = JRequest::getVar('logo', null, 'files', 'array');
        
        // Slide Images
        $slides[] = JRequest::getVar('slide1', null, 'files', 'array');
        $slides[] = JRequest::getVar('slide2', null, 'files', 'array');
        $slides[] = JRequest::getVar('slide3', null, 'files', 'array');
        $slides[] = JRequest::getVar('slide4', null, 'files', 'array');
        
        
        if (!($id = $model->addListing($form))) {
            $this->application->redirect($this->refer, 'Error! Failed to save listing', 'error');
        }
        else {
            $listingFolder = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id;
            $showcaseFolder = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'showcase';
            
            if ($this->createFolder($listingFolder)) {
                if ($logo['name']) {
                    $logofilename = JFile::makeSafe($logo['name']);
                    $logoExt = strtolower(JFile::getExt($logofilename));
                    $logopath = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'logo.' . $logoExt;
                
                    if (!$this->upload($logo['tmp_name'], $logopath)) {
                        JError::raiseWarning( 500, 'Error! Failed to load the logo');
                    }
                }
                
                if ($this->createFolder($showcaseFolder)) {
                    $this->addSlides($id, $slides);
                    
                    if (!empty($categories)) {
                        if (!$model->saveListingCategory((int)$id, $categories)) {
                            $this->application->redirect($this->refer, 'Error! Failed to categories', 'error');
                            exit();
                        }
                    }
                    
                    $this->application->redirect($this->refer, 'Listing successfully saved!', 'success');
                }
                else {
                    $this->application->redirect($this->refer, 'Error! Failed to create showcase folder', 'error');
                }
            }
            else {
                $this->application->redirect($this->refer, 'Error! Failed to create listing folder', 'error');
            }
        }
    }
    
    
    
    
    
    private function addSlides($id, $slides) {
        for ($i=0; $i < count($slides); $i++) {
            $slidefilename = JFile::makeSafe($slides[$i]['name']);
            $slideExt = strtolower(JFile::getExt($slidefilename));
            
            if ($slideExt) {
                $slidepath = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'showcase' . DS . "slide_{$i}." . $slideExt;
                
                if (!$this->upload($slides[$i]['tmp_name'], $slidepath)) {
                    JError::raiseWarning( 500, "Error! Failed to load the slide_{$i}");
                }
            }
        }
    }
    
    
    
    
    
    private function createFolder($path) {
	    if (!JFolder::exists($path)) { 
		    if(!JFolder::create($path, 0777)) {
                return false;
		    }
            else {
                return true;
            }                    
        }
        else {
            return true;
        }
    }




    public function upload($src, $dest) {
        if (JFile::exists($dest)) {
            JFile::delete($dest);  
        }
    
        if (JFile::upload($src, $dest)) {
            return true;
        }
    
        return false;
    }
}
