<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" enctype="multipart/form-data" name="admin" id="admin" method="post">
<fieldset>
<h2 style="margin-top: 0px">Add a category</h2>
<!-- Text input-->
<div class="control-group">
  <label class="control-label">Category Name</label>
  <div class="controls">
    <input id="name" name="name" placeholder="Name of Category" value="<?php if($this->category) echo $this->category->name; ?>" class="input-xxlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<?php 
if($this->categoriesHTML) {
?>
<div class="control-group">
  <label class="control-label">Categories</label>
  <div class="controls">
    <?php echo $this->categoriesHTML; ?>
  </div>
</div>
<?php } ?>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Category Image</label>
  <div class="controls">
    <input name="image" class="input-file" type="file">
    <p class="help-block"></p>
  </div>
</div>

<input type="hidden" name="option" value="com_saservice" />
<input type="hidden" name="task" value="admincategories.save" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Create Listing</button>
    <a id="cancel" href="<?php echo JRoute::_('index.php?option=com_saservice&view=admincategories'); ?>" class="btn btn-default">Cancel</a>
  </div>
</div>
</fieldset>
</form>
</div>

