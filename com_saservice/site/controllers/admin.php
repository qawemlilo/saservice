<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

class SaServiceControllerAdmin extends JController
{
	public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, array('ignore_request' => false));
	}
    
    
    
    
	public function savelisting () {
        //JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model = $this->getModel('admin');
        $form = array();
        
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
        $form['province'] = JRequest::getVar('province', '', 'post', 'string');
        $form['city'] = JRequest::getVar('city', '', 'post', 'string');
        $form['address'] = JRequest::getVar('address', '', 'post', 'string');
        
        
        
        // Business Info
        $form['logo'] = JRequest::getVar('logo', null, 'files', 'array');
        $form['slogan'] = JRequest::getVar('slogan', '', 'post', 'string');
        $form['categories'] = JRequest::getVar('categories', '', 'post', 'string');
        $form['services'] = JRequest::getVar('services', '', 'post', 'string');
        $form['aboutus'] = JRequest::getVar('aboutus', '', 'post', 'string');
        
        // Slide Images
        $form['slide1'] = JRequest::getVar('slide1', null, 'files', 'array');
        $form['slide1text'] = JRequest::getVar('slide1text', '', 'post', 'string');
        
        $form['slide2'] = JRequest::getVar('slide2', null, 'files', 'array');
        $form['slide2text'] = JRequest::getVar('slide2text', '', 'post', 'string');
        
        $form['slide3'] = JRequest::getVar('slide3', null, 'files', 'array');
        $form['slide3text'] = JRequest::getVar('slide3text', '', 'post', 'string');
        
        $form['slide4'] = JRequest::getVar('slide4', null, 'files', 'array');
        $form['slide4text'] = JRequest::getVar('slide4text', '', 'post', 'string');
        
        
        
        var_dump($form);
        
        return true;
    }
    
    
    
    
    public function savecategory () {
        //JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model = $this->getModel('Admin');
        
        $name = JRequest::getVar('name', '', 'post', 'string');
        $parent_id = JRequest::getVar('parent_id', 0, 'post', 'int');
        //$image = JRequest::getVar('image', null, 'files', 'array');
        
        if (!$model->addCategory($name, '', $parent_id)) {
            $application->redirect($refer, 'Error! Failed to save category', 'error');
        }
        else {
            $application->redirect($refer, 'Success! Category saved!', 'success');
        }
    }
}
