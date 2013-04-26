<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

class SaServiceControllerFeedBack extends JController
{
    public function email () {
        header("Content-type: application/json");

        $config = JComponentHelper::getParams('com_saservice');
        
        
        $name = JRequest::getVar('name', '', 'post', 'string');
        $email = JRequest::getVar('email', '', 'post', 'string');
        $serviceprovider = JRequest::getVar('serviceprovider', '', 'post', 'string');
        $phone = JRequest::getVar('phone', 0, 'post', 'int');
        $serviceperson = JRequest::getVar('serviceperson', '', 'post', 'string');
        $type = JRequest::getVar('type', '', 'post', 'string');
        $message = JRequest::getVar('message', '', 'post', 'string');
        
        $subject = $type . " from SA Network Service";
        
        $msg = "A $type has been sent from the SA Network Service website. \n \n";
        $msg .= "This is a $type sent by $name whose email address is $email . \n \n";
        $msg .= "Service Provider: $serviceprovider \n";
        $msg .= "Person Spoken To: $serviceperson \n";
        $msg .= "Service Provider Phone Number: $phone \n \n";
        
        $msg .= $message . "\n \n \n";
        $msg .= "SA Network Service";

        
        
        JUtility::sendMail($email, $name, $config->get('first_email'), $subject, $msg);
        
        echo '{"error":"false","message":"Thank you!"}';
        
        exit();
    }
}
