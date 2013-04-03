<?php 
defined('_JEXEC') or die('Restricted access'); // no direct access 

$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
?>

<div class="well">
  <img src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/images/search_64x64.png'?>" style="width:42px" title="Search" alt="Search" />
  <input type="text" name="service" data-provide="typeahead" autocomplete="off" id="service-field" placeholder="Service" style="padding: 10px; font-size:28px; width:300px; margin-right: 20px;" />
  <input type="text" name="location" id="location-field" placeholder="Your location..." style="padding: 10px; font-size:28px; width:300px; margin-right: 20px;" />
</div>
