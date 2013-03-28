<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

class SaServiceControllerAdmin extends JController
{
	function save_listing () {
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model =& $this->getModel();
        
        // General Info
        $name = JRequest::getVar('name', '', 'post', 'string');
        $email = JRequest::getVar('email', '', 'post', 'string');
        $phone = JRequest::getVar('phone', '', 'post', 'string');
        $cell = JRequest::getVar('cell', '', 'post', 'string');
        $fax = JRequest::getVar('fax', '', 'post', 'string');
        
        // Social Pages
        $twitter = JRequest::getVar('twitter', '', 'post', 'string');
        $facebook = JRequest::getVar('facebook', '', 'post', 'string');
        
        // Location Info
        $province = JRequest::getVar('province', '', 'post', 'string');
        $city = JRequest::getVar('city', '', 'post', 'string');
        $address = JRequest::getVar('address', '', 'post', 'string');
        
        
        
        // Business Info
        $logo = JRequest::getVar('logo', null, 'files', 'array');
        $slogan = JRequest::getVar('slogan', '', 'post', 'string');
        $categories = JRequest::getVar('categories', '', 'post', 'string');
        $services = JRequest::getVar('services', '', 'post', 'string');
        $aboutus = JRequest::getVar('aboutus', '', 'post', 'string');
        
        // Slide Images
        $slide1 = JRequest::getVar('slide1', null, 'files', 'array');
        $slide1text = JRequest::getVar('slide1text', '', 'post', 'string');
        
        $slide2 = JRequest::getVar('slide2', null, 'files', 'array');
        $slide2text = JRequest::getVar('slide2text', '', 'post', 'string');
        
        $slide3 = JRequest::getVar('slide3', null, 'files', 'array');
        $slide3text = JRequest::getVar('slide3text', '', 'post', 'string');
        
        $slide4 = JRequest::getVar('slide4', null, 'files', 'array');
        $slide4text = JRequest::getVar('slide4text', '', 'post', 'string');
        
        
        
        var_dump($_SERVER['POST']);
        
        exit();
    }
}
