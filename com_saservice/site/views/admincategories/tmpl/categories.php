<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('head');
?>
<div class="row-fluid">
  <form action="index.php?option=com_saservice&view=admin&layout=categories" method="post" name="myform">
   Display # <?php echo $this->pagination->getLimitBox() . " &nbsp; &nbsp; <span style=\"margin-left: 200px;\"> " . $this->pagination->getPagesCounter(); ?></span>
  </form>
</div>
<br>
<form>
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
          <input type="checkbox" value="<?php echo $category->id; ?>" name="cat-checkbox" id="cat<?php echo $category->id; ?>" />
        </td>
        <td>
          <a href="#"><?php echo $category->name; ?></a>
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
</div>
</form>

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
    });
}(jQuery));
</script>
