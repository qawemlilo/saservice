<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');

?>

<div class="row-fluid">
  <h2>Search results for: <span style="color: #333333"><?php echo $this->service; ?></span></h2>
</div>
<div class="row-fluid" style="padding: 0px;">
  <?php 
    if (is_array($this->listings) && count($this->listings) > 0) :
      $this->listResults($this->listings);
    else :
  ?>
    <div class="alert alert-block">Sorry we don't have matching results for what you are looking for, please help us improve SA Service Network by submitting the form below.</div>
    <div class="row-fluid">
      <form class="form-inline well" id="searchform" name="searchform" action="" method="post">
         <div class="progress progress-striped active" style="display:none">
           <div class="bar" style="width: 100%;"></div>
         </div>
         <div id="responseD" class="alert" style="display:none">
         </div>
         
       <input type="text" name="email" id="email" required="" class="input-xlarge" placeholder="Email" />
       <input type="hidden" name="service" value="<?php echo $this->service; ?>" />
       <input type="hidden" name="location" value="<?php echo $this->location; ?>" />
       <button type="submit" type="submit" class="btn">Submit</button>
      </form>
    </div>
  <?php
    endif;
  ?>
     
</div>
<div class="row-fluid" style="text-align: center">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>

<script type="text/javascript">
jQuery.noConflict();

(function ($) {
    $(function () {
        function IsEmail (email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        
        $("#searchform").on('submit', function () {   
            var self = this,
                progress = $('.progress'),
                responseD = $('#responseD');
            
            if (!IsEmail($("#email").val())) {
                return false;
            }
            
            progress.slideDown('slow', function () {
              $.post('index.php?option=com_saservice&task=listings.subscribe', $(self).serialize())
              .done(function(data) {
                progress.slideUp('slow', function () {
                    responseD.addClass('alert-success').html($('<strong>Message sent!</strong>')).slideDown('slow');
                });
                  
                window.setTimeout(function () { 
                    responseD.slideUp('slow', function () {
                        responseD.removeClass('alert-success');
                    }); 
                }, 10 * 1000);
              })
              .fail(function(data) {
                progress.slideUp('slow', function () {
                    responseD.addClass('alert-error').html($('<strong>Error, message not sent!</strong>')).slideDown();
                });
                  
                window.setTimeout(function () { 
                    responseD.slideUp('slow', function () {
                        responseD.removeClass('alert-error');
                    }); 
                }, 10 * 1000);
              });
            });
            
            return false;
        });
        
      if ($('.pagination').length) {
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
        
        $(pgnDiv).empty().append(ul)
      }        
    });
})(jQuery);
</script>

