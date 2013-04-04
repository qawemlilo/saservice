<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
class ModSsnsearchHelper
{
    public function getCategories () {
        $db =& JFactory::getDBO();
        $query = "SELECT id, name FROM #__ss_categories";
        $db->setQuery($query);
        
        $result = $db->loadObjectList();
        
        return $result;
    
    }
    
    public function createArry ($list) {
        $arr = '[';
        
        foreach ($list as $cat) {
            $arr .= '"' .$cat->name . '",';
        }
        
        $arr .= '"Other"]';
        
        return $arr;
    }
}