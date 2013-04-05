<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/style.css');

$alphas = range('A', 'Z');

?>

<h1>All Categories</h1>

<div class="pagination">
  <ul>
    <?php
      foreach($alphas as $alpha) {
        if ($this->alpha && $this->alpha == $alpha) {
            echo '<li class="disabled"><a href="' . JRoute::_("index.php?option=com_saservice&view=categories&alpha=" . $alpha) . '">' . $alpha . '</a></li>';
        }
        else {
            echo '<li><a href="' . JRoute::_("index.php?option=com_saservice&view=categories&alpha=" . $alpha) . '">' . $alpha . '</a></li>';
        }
      }
    ?>
  </ul>
</div>
<div class="row-fluid ss-categories">
<?php
$limit = ceil(count($this->categories) / 3);
$counter = 0;

if (is_array($this->categories) && count($this->categories) > 0) :
?>
 <div class="span4">
   <ul class="unstyled" style="padding-left: 0px">
<?php 
  foreach($this->categories as $category) {
    if ($counter == $limit) {
      echo '</ul></div><div class="span4"><ul class="unstyled" style="padding-left: 0px">';
      $counter = 0;
    }
    $href = JRoute::_("index.php?option=com_saservice&view=category&cid=" . $category->id);
    echo "<li><a href=\"$href\">$category->name</a></li>";
    
    $counter++;
  }
?>
    </ul>
  </div>
<?php

elseif (is_array($this->match) && count($this->match) > 0) :
?>
  <ul class="unstyled" style="padding-left: 0px">
  <?php
    foreach($this->match as $category) {
        $href = JRoute::_("index.php?option=com_saservice&view=category&cid=" . $category->id);
        echo "<li><a href=\"$href\">$category->name</a></li>";
    }
  ?>
  </ul>
<?php
else :
    echo '<div class="alert">Results not found. </div>';

endif;    
?>

</div>

