<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-validate form-horizontal well well-small" action="<?php echo JRoute::_('index.php'); ?>" enctype="multipart/form-data" name="admin" id="admin" method="post">
<fieldset>
<h2 style="margin-top: 0px">General Info</h2>
<!-- Text input-->
<div class="control-group">
  <label class="control-label">Service Provider</label>
  <div class="controls">
    <input id="name" name="name" placeholder="Name of Service Provider" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Email Address</label>
  <div class="controls">
    <input id="email" name="email" placeholder="Enter Email Address" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Tel Number</label>
  <div class="controls">
    <input id="phone" name="phone" placeholder="Telephone Number" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Cell Number</label>
  <div class="controls">
    <input id="cell" name="cell" placeholder="Cellphone Number" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Fax Number</label>
  <div class="controls">
    <input id="fax" name="fax" placeholder="Fax Number" class="input-xlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>
<h2> Social Pages</h2>
<!-- Prepended text-->
<div class="control-group">
  <label class="control-label">Twitter Handle</label>
  <div class="controls">
    <div class="input-prepend">
      <span class="add-on">@</span>
      <input id="twitter" name="twitter" class="span12" placeholder="Twitter Name" type="text">
    </div>
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Facebook Page</label>
  <div class="controls">
    <input id="facebook" name="facebook" placeholder="Facebook Page" class="input-xlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>


<h2>Location Info</h2>
<!-- Select Basic -->
<div class="control-group">
  <label class="control-label">Province</label>
  <div class="controls">
    <select id="province" name="province" class="input-xlarge">
      <option>Select Province</option>
      <option>Eastern Cape</option>
      <option>Free State</option>
      <option>Gauteng</option>
      <option>KwaZulu Natal</option>
      <option>Limpopo</option>
      <option>Mpumalanga</option>
      <option>Northern Cape</option>
      <option>North West</option>
      <option>Western Cape</option>
    </select>
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label">City</label>
  <div class="controls">
    <input id="city" name="city" placeholder="Your city" class="input-xlarge" required="" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">Physical Address</label>
  <div class="controls">                     
    <textarea name="address" class="input-xlarge" rows="8" placeholder="..."></textarea>
  </div>
</div>


<h2>Business Info</h2>

<!-- File Button --> 
<div class="control-group">
  <label class="control-label">Upload Logo</label>
  <div class="controls">
    <input name="logo" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Slogan</label>
  <div class="controls">
    <input name="slogan" placeholder="Slogan" class="input-xlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>


<!-- Text input-->
<div class="control-group">
  <label class="control-label">Categories</label>
  <div class="controls">
    <input name="categories" placeholder="e.g Building, Repair, Plumbing" class="input-xlarge" type="text">
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Services Offered</label>
  <div class="controls">
    <input name="services" placeholder="e.g Mobile websites, Joomla custom development, Website optimisation" class="input-xlarge" type="text">
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">About Us</label>
  <div class="controls">                     
    <textarea name="aboutus" class="input-xlarge" rows="2" placeholder="..."></textarea>
  </div>
</div>

<h2>Showcase Images</h2>
<!-- File Button --> 
<div class="control-group">
  <label class="control-label">Slide 1</label>
  <div class="controls">
    <input name="slide1" class="input-file" type="file"> <br>
    <textarea name="slide1text" class="input-xlarge" rows="2" placeholder="Description..."></textarea>
  </div>
</div>
<div class="control-group">
  <label class="control-label">Slide 2</label>
  <div class="controls">
    <input name="slide2" class="input-file" type="file"> <br>
    <textarea name="slide2text" class="input-xlarge" rows="2" placeholder="Description..."></textarea>
  </div>
</div>
<div class="control-group">
  <label class="control-label">Slide 3</label>
  <div class="controls">
    <input name="slide3" class="input-file" type="file"> <br>
    <textarea name="slide3text" class="input-xlarge" rows="2" placeholder="Description..."></textarea>
  </div>
</div>
<div class="control-group">
  <label class="control-label">Slide 4</label>
  <div class="controls">
    <input name="slide4" class="input-file" type="file"> <br>
    <textarea name="slide4text" class="input-xlarge" rows="2" placeholder="Description..."></textarea>
  </div>
</div>

<input type="hidden" name="option" value="com_saservice" />
<input type="hidden" name="task" value="admin.savelisting" />
<?php echo JHtml::_('form.token'); ?>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Create Listing</button>
    <button id="cancel" name="cancel" class="btn btn-default">Cancel</button>
  </div>
</div>

</fieldset>
</form>

</div>
