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
  <div class="span8">
      <div class="row-fluid">
      
        <?php echo $this->tags; ?>
      
        <h1><?php echo $this->listing->name; ?></h1>
      
        <h3 style="margin:-8px 0px 20px 0px;"><?php echo $this->listing->slogan; ?></h3>
      </div>
      <div class="row-fluid">
       <div class="span8">
          <?php echo $this->slider; ?>
       </div>
      
       <div class="span4">
        <h2 style="margin-top: 5px">Services Offered</h2>
        <ul class="unstyled services-offered">
          <?php 
            $listHtml = $this->createLists($this->listing->services_offered);
            echo $listHtml;
          ?>
        </ul>
       </div>
      </div>
      
      <div class="row-fluid">
        <h2>About Us</h2>
        <p><?php echo $this->listing->aboutus; ?></p>
      </div>
      
      <div class="row-fluid">
       <h2>Contact Us</h2>
       <form method="post" name="contactusform"  id="contactusform" class="well">
         <div class="progress progress-striped active" style="display:none">
           <div class="bar" style="width: 100%;"></div>
         </div>
         <div id="responseD" class="alert" style="display:none">
         </div>
         <div class="control-group">
           <label class="control-label" for="name"> <i class="icon-user"> </i> Name</label>
        
           <div class="controls controls-row">
             <input type="text" style="margin-left: 0px" required="" class="span12" placeholder="Your name" name="name">
           </div>
         </div>
         <div class="control-group">
           <label class="control-label" for="email"> <i class="icon-envelope"> </i> Email</label>
        
           <div class="controls">
             <input type="text" style="margin-left: 0px" class="span12" required="" placeholder="Your email address" name="email">
           </div>
         </div>
         <div class="control-group">
           <label class="control-label" for="message"> <i class="icon-pencil"> </i> Message </label>
        
           <div class="controls">
             <textarea style="margin-left: 0px" class="span12" required="" placeholder="Your message..." name="message" rows="3"></textarea>
           </div>
         </div>
         <p><button class="btn btn-large btn-success" type="submit">Submit</button></p>
         <input type="hidden" name="listing_id" value="<?php echo $this->listing->id; ?>" />
         <?php echo JHtml::_('form.token'); ?>
       </form>
      </div>
    </div>  
  
  <div class="span4">
    <div>
      <img src="<?php echo JURI::base() . 'media/com_saservice/listings/listing_' . $this->listing->id . '/logo.png'; ?>" />
    </div>
    <h2>Location</h2>
    <div class="well" style="margin: 0px 0px 5px 0px; padding: 5px; margin-top: 10px">
      <div id="ss_listingmap" style="height: 250px;">
      
      </div>
    </div>
    <h2>Contact Details</h2>
    <div class="row-fluid">
      <ul class="nav nav-list panel-list" style="margin-top: 0px"> 
        <li><a onclick="return false;" href="tel:0'<?php echo $this->listing->phone; ?>"><i class="icon-phone"></i> 0<?php echo $this->listing->phone; ?></a></li>
        <?php 
            if($this->listing->fax) echo '<li style="line-height: 26px;"><a onclick="return false;" href="tel:0' . $this->listing->fax . '"><i class="icon-print"></i> 0' .$this->listing->fax . '</a></li>'; 
        ?>
        <?php 
          if($this->listing->cell) echo '<li style="line-height: 26px;"><a onclick="return false;" href="tel:0' . $this->listing->cell . '"><i class="icon-mobile-phone"></i> 0' . $this->listing->cell . '</a></li>'; 
        ?>
        <li style="line-height: 26px;"><a href="mailto:<?php echo $this->listing->email; ?>" target="_blanck"><i class="icon-envelope-alt"></i> <?php echo $this->listing->email; ?></a></li>
        <?php 
          if($this->listing->website) echo '<li style="line-height: 26px;"><a href="' . $this->listing->website . '" target="_blanck"><i class="icon-globe"></i> ' . $this->listing->website . '</a></li>'; 
        ?>
        <?php 
          if($this->listing->facebook) echo '<li style="line-height: 26px;"><a href="' . $this->listing->facebook . '" target="_blanck"><i class="icon-facebook-sign"></i>  Facebook</a></li>';
        ?>
        <?php 
          if($this->listing->twitter) echo '<li style="line-height: 26px;"><a href="http://twitter.com/' . $this->listing->twitter . '" target="_blanck"><i class="icon-twitter-sign"></i> @' . $this->listing->twitter . '</a></li>'; 
        ?>
      </ul>
    </div>
  </div> 
</div>
<script type="text/javascript" src="<?php echo JURI::base() . 'components/com_saservice/asserts/js/bootstrap.min.js'; ?>"></script>
<script>document.write('<script src="http://maps.google.com/maps/api/js?sensor=true&region=ZA"><\/script>')</script>
<script type="text/javascript" src="<?php echo JURI::base() . 'components/com_saservice/asserts/js/maps.js'; ?>"></script>
<script type="text/javascript">
jQuery.noConflict();

(function($) {
    $(function() {
        function IsEmail (email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        
        
        $("#contactusform").on('submit', function () {   
            var self = this,
                progress = $('.progress'),
                responseD = $('#responseD');
            
            progress.slideDown('slow', function () {
              $.post('index.php?option=com_saservice&task=listings.email', $(self).serialize())
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
        
        var map = new GMaps({
            div: '#ss_listingmap',
            lat: <?php echo $this->listing->lat; ?>,
            lng: <?php echo $this->listing->lng; ?>
        });
      
        GMaps.geocode({
            address: "<?php echo $this->listing->formatted_address; ?>",
            callback: function(results, status){
                if (status=='OK'){
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng.lat(), latlng.lng());
                    map.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng()
                    });
                }
            }
        });
      
        $('#myCarousel').carousel({
            interval: 7000
        });
    });
})(jQuery);
</script>
