<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once(dirname(__FILE__).DS.'helper.php');


$cats = ModSsnsearchHelper::getCategories();
$arr = ModSsnsearchHelper::createArry($cats);


require(JModuleHelper::getLayoutPath('mod_ssnsearch'));