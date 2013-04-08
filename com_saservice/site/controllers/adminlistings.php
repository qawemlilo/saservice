<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class SaServiceControllerAdminlistings extends JController
{
    private $refer;
    
    
    public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true)) {
        return parent::getModel($name, $prefix, array('ignore_request' => false));
    }
    
    
    
    
    public function savelisting () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $this->refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel('admin');
        $form = array();
        $slides = array();
        $categories = array();
        
        // General Info
        $form['name'] = JRequest::getVar('name', '', 'post', 'string');
        $form['email'] = JRequest::getVar('email', '', 'post', 'string');
        $form['phone'] = JRequest::getVar('phone', '', 'post', 'string');
        $form['cell'] = JRequest::getVar('cell', '', 'post', 'string');
        $form['fax'] = JRequest::getVar('fax', '', 'post', 'string');
        
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
        $categories = JRequest::getVar('categories', '', 'post', 'array');
        $form['services_offered'] = JRequest::getVar('services', '', 'post', 'string');
        $form['aboutus'] = JRequest::getVar('aboutus', '', 'post', 'string');       
        
        $logo = JRequest::getVar('logo', null, 'files', 'array');
        
        // Slide Images
        $slides[] = JRequest::getVar('slide1', null, 'files', 'array');
        $slides[] = JRequest::getVar('slide2', null, 'files', 'array');
        $slides[] = JRequest::getVar('slide3', null, 'files', 'array');
        $slides[] = JRequest::getVar('slide4', null, 'files', 'array');
        
        if (!($id = $model->addListing($form))) {
            $application->redirect($this->refer, 'Error! Failed to save category', 'error');
        }
        else {
            $listingFolder = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id;
            $showcaseFolder = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'showcase';
            
            if ($this->createFolder($listingFolder)) {
                if (isset($logo)) {
                    $logofilename = JFile::makeSafe($logo['name']);
                    $logoExt = strtolower(JFile::getExt($logofilename));
                    $logopath = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'logo.' . $logoExt;
                
                    if (!$this->upload($logo['tmp_name'], $logopath)) {
                        $application->redirect($this->refer, 'Error! Failed to load the logo', 'error');
                        exit();
                    }
                }
                
                if ($this->createFolder($showcaseFolder)) {
                    
                    if(!$this->addSlides($id, $slides)) {
                        application->redirect($this->refer, "Error! Failed to upload a slide image", "error");
                    }
                    
                    foreach ($categories as $category) {
                        $model->addCategory((int)$id, (int)$category);
                    }                    
                    
                    $application->redirect($this->refer, 'Listing successfully saved!', 'success');
                }
                else {
                    $application->redirect($this->refer, 'Error! Failed to create showcase folder', 'error');
                }
            }
            else {
                $application->redirect($this->refer, 'Error! Failed to create listing folder', 'error');
            }
        }
    }
    
    
    
    
    
    private function addCategories($id, $slides) {
        if (!is_array($slides)) {
            return false;
        }
        
        for ($i=0; $i < count($slides); $i++) {
            if ($slides[$i]) {
                $slidefilename = JFile::makeSafe($slides[$i]['name']);
                $slideExt = strtolower(JFile::getExt($slidefilename));
                $slidepath = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'showcase' . DS . "slide_{$i}." . $slideExt;
                
                if (!$this->upload($slides[$i]['tmp_name'], $slidepath)) {
                    $application->redirect($this->refer, "Error! Failed to load the slide_{$i}", "error");
                    exit();
                }
            }
        }
    }
    
    
    
    
    
    private function addSlides($id, $slides) {
        if (!is_array($slides)) {
            return false;
        }
        
        for ($i=0; $i < count($slides); $i++) {
            if ($slides[$i]) {
                $slidefilename = JFile::makeSafe($slides[$i]['name']);
                $slideExt = strtolower(JFile::getExt($slidefilename));
                $slidepath = JPATH_SITE . DS . 'media' . DS . 'com_saservice' . DS . 'listings' . DS . 'listing_' . $id . DS . 'showcase' . DS . "slide_{$i}." . $slideExt;
                
                if (!$this->upload($slides[$i]['tmp_name'], $slidepath)) {
                    $application->redirect($this->refer, "Error! Failed to load the slide_{$i}", "error");
                    exit();
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
