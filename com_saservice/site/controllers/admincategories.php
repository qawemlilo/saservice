<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class SaServiceControllerAdmincategories extends JController
{
    private $refer;
    
    
	public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, array('ignore_request' => false));
	}
    
    
    
    
    public function add () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model = $this->getModel('admincategories');
        $form = array();
        
        $form['name'] = JRequest::getVar('name', '', 'post', 'string');
        $form['parent_id'] = JRequest::getVar('parent_id', 0, 'post', 'int');
        $image = JRequest::getVar('image', null, 'files', 'array');
        
        if (!$model->addCategory($form)) {
            $application->redirect($refer, 'Error! Failed to save category', 'error');
        }
        else {
            $application->redirect($refer, 'Category successfully saved!', 'success');
        }
    }
    
    
    
    
    public function remove () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model = $this->getModel('admincategories');
        $categories = JRequest::getVar('categories', null, 'post', 'array');
        
        if (is_array($categories) && !empty($categories) && count($categories) > 0) {
            if (!$model->removeCategory($categories)) {
                $application->redirect($refer, 'Error! Failed to delete Category(s)', 'error');
            }
            else {
                $application->redirect($refer, 'Category(s) successfully deleted!', 'success');
            }
        }
        else {
            $application->redirect($refer, 'Error! No categories were selected', 'error');
        }
    }
    
    public function edit () {
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $application =& JFactory::getApplication();
        $refer = JRoute::_($_SERVER['HTTP_REFERER']);
        $model = $this->getModel('admincategories');
        $categories = JRequest::getVar('categories', null, 'post', 'array');
        
        if (is_array($categories) && !empty($categories) && count($categories) > 0) {
            if (!($id = (int)$categories[0])) {
                $application->redirect($refer, 'Error! Failed to open Category', 'error');
            }
            else {
                $nextpage = JRoute::_('index.php?option=com_saservice&view=admincategories&layout=edit&id=' . $id);
                $application->redirect($nextpage);
            }
        }
        else {
            $application->redirect($refer, 'Error! No category was selected', 'error');
        }
    }
}
