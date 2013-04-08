<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid" id = "ss-admin-table">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="width:40px;">&nbsp;</th>
        <th>Service Provider</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    if (isset($this->listings) && is_array($this->listings)) :
      foreach ($this->listings as $listing) {
    ?>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="<?php echo $listing->id; ?>" name="list-checkbox" id="list<?php echo $listing->id; ?>" />
        </td>
        <td>
          <a href="#"><?php echo $listing->name; ?></a>
        </td>
        <td>
          <?php echo $listing->phone; ?>
        </td>
        <td>
          <a href="mailto:<?php echo $listing->email; ?>"><?php echo $listing->email; ?></a>
        </td>
      </tr>
    <?php
      }
    endif;
    ?>
    </tbody>
  </table>
</div>
