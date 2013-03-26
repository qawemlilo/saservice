<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/style.css');
?>

<div class="row-fluid">
    <div class="span7">
     <h1 style="padding-top: 25px;">SA Service Network Admin</h1>
    </div>
    
    <div class="span5" style="text-align: center; font-size: 14px;">
      <ul class="thumbnails">
       <li class="span3">
        <a href="#" class="thumbnail">
          <img alt="" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/admin-add.png'; ?>" />
          New
        </a>
       </li>
       <li class="span3">
        <a href="#" class="thumbnail">
          <img alt="" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/admin-yes.png'; ?>" />
          Edit
        </a>
       </li>
       <li class="span3">
        <a href="#" class="thumbnail">
          <img alt="" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/admin-delete.png'; ?>" />
          Delete
        </a>
       </li>
      </ul>
    </div>
</div>

<div class="well well-small" style="font-size: 14px;">
  <ul class="unstyled inline" style="padding-bottom: 0px; margin-bottom: 0px; padding-left:0px; margin-top: 0px">
    <li><a href="http://www.scottwebdesigns.co.za/saservice/index.php?option=com_saservice&view=admin" class="active">Listings</a></li> |
    <li><a href="http://www.scottwebdesigns.co.za/saservice/index.php?option=com_saservice&view=admin&layout=categories">Categories</a></li> |
    <li><a href="#">Areas</a></li>
  </ul>
</div>

<div class="row-fluid" id = "ss-admin-table">
  <table class="table table-bordered table-striped">
    <colgroup>
      <col class="span1">
      <col class="span5">
      <col class="span3">
      <col class="span3">
    </colgroup>
    
    <thead>
      <tr>
        <th style="width:40px;">&nbsp;</th>
        <th>Service Provider</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
    </thead>
    
    <tbody>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="all" id="selectAllListings" />
        </td>
        <td>
          <a href="#">Scott Web Design</a>
        </td>
        <td>
          031 309 2226
        </td>
        <td>
          <a href="mailto:info@scottwebdesigns.co.za">info@scottwebdesigns.co.za</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
