<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

class SaServiceControllerListings extends JController
{
    public function email () {
        header("Content-type: application/json");

        $config = JComponentHelper::getParams('com_saservice');
        
        $id = JRequest::getVar('listing_id', 0, 'post', 'int');
        $name = JRequest::getVar('name', '', 'post', 'string');
        $email = JRequest::getVar('email', '', 'post', 'string');
        $message = JRequest::getVar('message', '', 'post', 'string');
        
        $msg = "From: $name \n";
        $msg .= "Email: $email \n";
        $msg .= "Message: $message \n";
        $msg .= "Page: " . JRoute::_(JURI::base() . 'index.php?option=com_saservice&view=listing&id=' . $id) . "\n \n \n";
        
        $msg .= "SA Network Service";
        
        
        JUtility::sendMail($email, 'SA Network Service', $config->get('first_email'), 'Message from Listings Page', $msg);
        
        echo '{"error":"false","message":"Thank you!"}';
        
        exit();
    }
    
    
    
    
    public function subscribe () {
        header("Content-type: application/json");

        $config = JComponentHelper::getParams('com_saservice');

        $email = JRequest::getVar('email', 0, 'post', 'string');
        $service = JRequest::getVar('service', 0, 'post', 'string');
        $location = JRequest::getVar('location', 0, 'post', 'string');
        
        $msg = "A user on the website left their email address after a failed search. \n";
        $msg .= "Email: $email \n \n";
        
        $msg .= "FAILED QUERY \n";  
        $msg .= "Service: $service \n";
        $msg .= "Location: $location \n \n \n";
        
        $msg .= "SA Network Service";
        
        
        JUtility::sendMail($email, 'SA Network Service', $config->get('second_email'), 'Failed Search', $msg);
        
        echo '{"error":"false","message":"Thank you!"}';
        
        exit();
    }
}
