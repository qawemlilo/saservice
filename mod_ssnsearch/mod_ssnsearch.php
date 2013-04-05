<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once(dirname(__FILE__).DS.'helper.php');


$categories = ModSsnsearchHelper::getCategories();
$categoriesArray = ModSsnsearchHelper::createCategoriesArray($categories);


require(JModuleHelper::getLayoutPath('mod_ssnsearch'));