<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');

$service = JRequest::getVar('service', 'Not Specified', 'get', 'string');
$location = JRequest::getVar('location', 'Not Specified', 'get', 'string');
?>

<div class="row-fluid">
  <h1><?php echo $service . ' in ' . $location; ?></h1>
</div>
<div class="row-fluid" style="padding: 20px; text-align: center;">
  <img src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/page-under-construction.jpg'; ?>" alt="">
</div>

