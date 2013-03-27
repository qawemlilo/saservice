<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
  <table class="table table-bordered table-striped">
    <colgroup>
      <col class="span1">
      <col class="span6">
      <col class="span5">
    </colgroup>
    
    <thead>
      <tr>
        <th style="width:40px;"> &nbsp; </th>
        <th>Area Name</th>
      </tr>
    </thead>
    
    <tbody>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="all" id="selectAllListings" />
        </td>
        <td>
          <a href="#">Durban</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
