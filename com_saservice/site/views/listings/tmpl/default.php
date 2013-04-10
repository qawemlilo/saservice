<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');

?>

<div class="row-fluid">
  <h2>Search results for: <span style="color: #333333"><?php echo $this->service; ?></span></h2>
</div>
<div class="row-fluid" style="padding: 0px;">
  <?php 
    if (is_array($this->listings) && count($this->listings) > 0) :
      echo '<ul class="thumbnails" style="padding-left: 0px">';
      foreach ($this->listings as $listing) {
  ?>
        <li class="span2">
          <a href="<?php echo JRoute::_('index.php?option=com_saservice&view=listing&id=' . $listing->id); ?>" class="thumbnail">
              <img src="<?php echo JURI::base() . 'media/com_saservice/listings/listing_' . $listing->id . '/logo.png'; ?>" title="<?php echo $listing->name ?>" alt="<?php echo $listing->name ?>">
              <i class="icon-info-sign"></i>  <?php echo $listing->name ?>
          </a>
        </li>
  <?php
      }
      echo '</ul>';
    else :
  ?>
    <div class="alert alert-block" style="text-align: center;">No results were found.</div>
  <?php
    endif;
  ?>
     
</div>

