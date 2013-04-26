<?php
/**
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/font-awesome.min.css');
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/style.css');
?>

<div class="row-fluid" id="ss_listing">
    <div class="row-fluid">
       <h2>Complaints & Compliments</h2>
       <form method="post" name="complaintform" id="complaintform" class="well">
         <h3 style="margin-top: 0px">Your Details</h3>
         
         <div class="progress progress-striped active" style="display:none">
           <div class="bar" style="width: 100%;"></div>
         </div>
         
         <div id="responseD" class="alert" style="display:none">
         </div>
         
         <div class="control-group">
           <label class="control-label" for="name"> <i class="icon-user"> </i> Your Name</label>
        
           <div class="controls controls-row">
             <input type="text" style="margin-left: 0px" required="" class="span12" placeholder="Your name" name="name">
           </div>
         </div>
         
         <div class="control-group">
           <label class="control-label" for="email"> <i class="icon-envelope-alt"> </i> Your Email Address</label>
        
           <div class="controls">
             <input type="text" style="margin-left: 0px" class="span12" required="" placeholder="Your email address" name="email">
           </div>
         </div>
         
         <h3 style="margin-top: 40px">Service Provider Details</h3>
         
         <div class="control-group">
           <label class="control-label" for="serviceprovider"> <i class="icon-suitcase"> </i> Business Name</label>
        
           <div class="controls controls-row">
             <input type="text" style="margin-left: 0px" required="" class="span12" placeholder="Business Name" name="serviceprovider">
           </div>
         </div>
         
         
         <div class="control-group">
           <label class="control-label" for="phone"> <i class="icon-phone"> </i> Phone Number</label>
        
           <div class="controls controls-row">
             <input type="text" style="margin-left: 0px" required="" class="span12" placeholder="Business Phone Number" name="phone">
           </div>
         </div>
         
         
         <div class="control-group">
           <label class="control-label" for="serviceperson"> <i class="icon-user-md"> </i> Name of person you dealt with</label>
        
           <div class="controls controls-row">
             <input type="text" style="margin-left: 0px" required="" class="span12" placeholder="Name of person" name="serviceperson">
           </div>
         </div>
         
  
         <div class="control-group">
           <label class="control-label" for="type"> <i class="icon-thumbs-up"> </i>Is this a Compliment or Complaint? <i class="icon-thumbs-down"></i></label>
        
           <div class="controls controls-row">
             <select type="text" style="margin-left: 0px" class="input-xlarge"required="" name="type">
                <option value="">Select Option</option>
                <option value="Compliment">Compliment</option>
                <option value="Complaint">Complaint</option>
             </select>
           </div>
         </div>
         
         
         
         <div class="control-group">
           <label class="control-label" for="message"> <i class="icon-comment"> </i> What do you wish to say? </label>
        
           <div class="controls">
             <textarea style="margin-left: 0px" class="span12" required="" placeholder="Your message..." name="message" rows="3"></textarea>
           </div>
         </div>
         <p><button class="btn btn-large btn-success" type="submit">Submit</button></p>
         <?php echo JHtml::_('form.token'); ?>
       </form>
    </div> 
</div>
<script type="text/javascript" src="<?php echo JURI::base() . 'components/com_saservice/asserts/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript">
jQuery.noConflict();

(function($) {
    $(function() {
        function IsEmail (email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        
        
        $("#complaintform").on('submit', function () {   
            var self = this,
                progress = $('.progress'),
                responseD = $('#responseD');
            
            progress.slideDown('slow', function () {
              $.post('index.php?option=com_saservice&task=feedback.email', $(self).serialize())
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
 
    });
})(jQuery);
</script>
