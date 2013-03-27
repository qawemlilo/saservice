<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
<form class="form-horizontal well">
<fieldset>

<!-- Form Name -->
<legend>New Listing</legend>

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
    <input id="city" name="city" placeholder="Your city" class="input-xlarge" required="" type="password">
    <p class="help-block"></p>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">Physical Address</label>
  <div class="controls">                     
    <div id="address" name="address" class="textarea">
      <textarea>...</textarea>
    </div>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Slogan</label>
  <div class="controls">
    <input id="slogan" name="slogan" placeholder="Slogan" class="input-xlarge" type="text">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Services Offered</label>
  <div class="controls">
    <input id="services" name="services" placeholder="e.g Building, Repair, Plumbing" class="input-xlarge" type="text">
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">About Us</label>
  <div class="controls">                     
    <div id="aboutus" name="aboutus" class="textarea">
      <textarea class="input-xlarge" rows="8">...</textarea>
    </div>
  </div>
</div>

<!-- File Button --> 
<div class="control-group">
  <label class="control-label">Upload Logo</label>
  <div class="controls">
    <input id="logo" name="logo" class="input-file" type="file">
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-success">Create Listing</button>
    <button id="cancel" name="cancel" class="btn btn-default">Cancel</button>
  </div>
</div>

</fieldset>
</form>

</div>
