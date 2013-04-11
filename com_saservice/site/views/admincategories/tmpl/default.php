<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>

<div class="row-fluid">
  <form action="<?php echo JRoute::_('index.php?option=com_saservice&view=admincategories'); ?>" method="post" name="myform">
   Display # <?php echo $this->pagination->getLimitBox() . " &nbsp; &nbsp; <span style=\"margin-left: 200px;\"> " . $this->pagination->getPagesCounter(); ?></span>
  </form>
</div>
<br>
<div class="row-fluid" id="ss-admin-table">
<form action="<?php echo JRoute::_('index.php?option=com_saservice&view=admincategories'); ?>" method="post" id="categories-form" name="categories-form">
  <table class="table table-bordered table-striped">
    <colgroup>
      <col class="span1">
      <col class="span6">
      <col class="span5">
    </colgroup>
    
    <thead>
      <tr>
        <th style="width:40px;"> &nbsp; </th>
        <th>Category</th>
        <th>ID</th>
      </tr>
    </thead>
    
    <tbody>
    <?php
    if ($this->categories) :
      foreach ($this->categories as $category) {
    ?>
      <tr>
        <td style="text-align: center">
          <input type="checkbox" value="<?php echo $category->id; ?>" name="categories" />
        </td>
        <td>
          <a href="<?php echo JRoute::_('index.php?com_saservice&view=admincategories&layout=edit&id=' . $category->id ); ?>"><?php echo $category->name; ?></a>
        </td>
        <td>
          <?php echo $category->id; ?>
        </td>
      </tr>
    <?php
      }
    endif;
    ?>
    </tbody>
  </table>
<input type="hidden" id="hidden-task" name="task" value="admincategories.remove" />
<?php echo JHtml::_('form.token'); ?>
</form>
</div>


<div class="row-fluid" style="text-align: center">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script type="text/javascript">
jQuery.noConflict();

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
        
        $('#delete-category').on('click', function () {
            var yes = confirm('Are you sure you want to delete the selected item(s)?');
            
            if (yes) {
               $('#categories-form').submit();
            }
            
            return false;
        });
        
        $('#edit-category').on('click', function () {
            $('#hidden-task').val('admincategories.edit');
            
            if ($('#hidden-task').val() === 'admincategories.edit') {
                $('#categories-form').submit();
            }
            
            return false;
        });
    });
}(jQuery));
</script>
