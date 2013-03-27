<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

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
