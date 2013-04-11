<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>
<div class="row-fluid">
  <form action="<?php echo JRoute::_('index.php?option=com_saservice&view=adminlistings'); ?>" method="post" name="pagination-form">
   Display # <?php echo $this->pagination->getLimitBox() . " &nbsp; &nbsp; <span style=\"margin-left: 200px;\"> " . $this->pagination->getPagesCounter(); ?></span>
  </form>
</div>
<br>
<div class="row-fluid" id="ss-admin-table">
<form action="<?php echo JRoute::_('index.php?option=com_saservice&view=adminlistings'); ?>" method="post" id="listings-form" name="listings-form">
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
          <input type="checkbox" value="<?php echo $listing->id; ?>" name="listings[]" />
        </td>
        <td>
          <a href="<?php echo JRoute::_('index.php?com_saservice&view=adminlistings&layout=edit&id=' . $listing->id ); ?>"><?php echo $listing->name; ?></a>
        </td>
        <td>
          0<?php echo $listing->phone; ?>
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
  
<input type="hidden" id="hidden-task" name="task" value="adminlistings.remove" />
<?php echo JHtml::_('form.token'); ?>
</form>
</div>
<div class="row-fluid" style="text-align: center">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>

<script type="text/javascript">
(function ($) {
    $(function () {
        var pgnDiv = $('.pagination')[0],
            ul = $('<ul>'),
            li, child;
        
        $(pgnDiv).children().each(function () {
            child = $(this);
            li = $('<li>');
            
            if (child.prop("tagName") === 'STRONG') {
              li.addClass('disabled');
              
              child = $('<a>', {
                href: "#",
                html: child.text()
              });
            }
            li.append(child);
            ul.append(li);
        });
        
        $(pgnDiv).empty().append(ul); 
        
        
        $('#delete-listing').on('click', function () {
            var yes = confirm('Are you sure you want to delete the selected item(s)?');
            
            if (yes) {
               $('#listings-form').submit();
            }
            
            return false;
        });

        
        $('#edit-listing').on('click', function () {
            $('#hidden-task').val('adminlistings.edit');
            
            if ($('#hidden-task').val() === 'adminlistings.edit') {
                $('#listings-form').submit();
            }
            
            return false;
        });
    });
}(jQuery));
</script>
