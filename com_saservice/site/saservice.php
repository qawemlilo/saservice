<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

require_once( JPATH_COMPONENT.DS.'controller.php' );


if ($controller = JRequest::getWord('view')) 
{
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if (file_exists($path)) 
	{
		require_once $path;
	} else {
		$controller = '';
	}
}

// Create the controller
$classname	= 'SaServiceController'.$controller; // {Componentname}{Controller}{Controllername}
$controller	= new $classname();

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

// Redirect if set by the controller
$controller->redirect();
