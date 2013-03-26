<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
 

 

class SaServiceTableListing extends JTable
{
    function __construct(&$db) 
    {
        parent::__construct('#__ss_listings', 'id', $db);
    }
}