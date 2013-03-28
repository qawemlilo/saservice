<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

class SaServiceController extends JController
{
	function display() {
        $user =& JFactory::getUser();
        $currentPage = JFactory::getURI();
        $application =& JFactory::getApplication();
            
        $return = $currentPage->toString();
        $url = 'index.php?option=com_user&view=login';
        $url .= '&return=' . base64_encode($return);

        if($user->guest) {
            $application->redirect($url, 'Restricted area, login required', 'error');
        }
        
        if(!JRequest::getVar('view')) {
            JRequest::setVar('view', 'admin');
        }
        
        parent::display();
    }
}
