<?php
/**
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/style.css');
$document->addScript('http://maps.google.com/maps/api/js?sensor=true');
$document->addScript(JURI::base() . 'components/com_saservice/asserts/js/maps.js');
?>

<div class="row-fluid" id="ss_listing">
  <div class="span8">
      <div class="row-fluid">
        <p><i class="icon-tags"></i> <span class="label  label-warning">Web designers</span></p>
      
        <h1><?php echo $this->listing->name; ?></h1>
      
        <h3 style="margin:-8px 0px 20px 0px;"><?php echo $this->listing->slogan; ?></h3>
      </div>
      <div class="row-fluid">
       <div class="span8">
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
      <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="active item">
              <img alt="" style="height: 250px" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/slides/listing_1/beachbeyondwebsite.png'; ?>" />
            </div>
            <div class="item">
              <img alt="" style="height: 250px" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/slides/listing_1/juciymediawebsitedesign.png'; ?>" />
            </div>
            <div class="item">
              <img alt="" style="height: 250px" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/slides/listing_1/mojovidswebsite.png'; ?>" />
            </div>
          </div>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div> 
       </div>
      
       <div class="span4">
        <h2 style="margin-top: 5px">Services Offered</h2>
        <ul class="unstyled services-offered">
          <li>Web Design</li>
          <li>Web Hosting</li>
          <li>Logo Design</li>
          <li>Custom Development</li>
          <li>Search Engine Optimization</li>
          <li>Web Design</li>
          <li>Web Hosting</li>
          <li>Logo Design</li>
          <li>Custom Development</li>
          <li>Search Engine Optimization</li>
        </ul>
       </div>
      </div>
      
      <div class="row-fluid">
        <h2>About Us</h2>
        <p><?php echo $this->listing->aboutus; ?></p>
      </div>
      
      <div class="row-fluid">
       <h2>Contact Us</h2>
       <form method="post" action="" class="well">
         <div class="control-group">
           <label class="control-label" for="name"> <i class="icon-user"> </i> Name</label>
        
           <div class="controls controls-row">
             <input type="text" style="margin-left: 0px" class="input-xxlarge" placeholder="Your name" name="name" id="name">
           </div>
         </div>
         <div class="control-group">
           <label class="control-label" for="email"> <i class="icon-envelope"> </i> Email</label>
        
           <div class="controls">
             <input type="text" style="margin-left: 0px" class="input-xxlarge" placeholder="Your email address" id="email" name="email">
           </div>
         </div>
         <div class="control-group">
           <label class="control-label" for="message"> <i class="icon-pencil"> </i> Message </label>
        
           <div class="controls">
             <textarea style="margin-left: 0px" class="input-xxlarge" placeholder="Your message..." name="message" id="message" rows="3"></textarea>
           </div>
         </div>
         <p><button class="btn btn-large btn-success" type="submit">Submit</button></p>
       </form>
      </div>
    </div>  
  
  <div class="span4">
    <div>
      <img src="<?php echo JURI::base() . 'media/com_saservice/listings/listing_' . $this->listing->id . '/logo.png'; ?>" />
    </div>
    <h3>Location</h3>
    <div class="well" style="margin: 0px 0px 5px 0px; padding: 5px; margin-top: 10px">
      <div id="ss_listingmap" style="height: 250px;">
      
      </div>
    </div>
    <h3>Contact Details</h3>
    <div class="row-fluid">
      <ul class="nav nav-list panel-list" style="margin-top: 0px">
        <li><a href="mailto:<?php echo $this->listing->email; ?>" target="_blanck"><i class="icon-envelope"></i><?php echo $this->listing->email; ?></a></li>
        <li><i class="icon-comment"></i> 0<?php echo $this->listing->phone; ?></li>
        <li><a href="http://www.scottwebdesigns.co.za" target="_blanck"><i class="icon-globe"></i> http://www.scottwebdesigns.co.za</a></li>
      </ul>
    </div>
  </div> 
</div>
<script type="text/javascript" src="<?php echo JURI::base() . 'components/com_saservice/asserts/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript">
  if(typeof jQuery !== 'undefined') {
    var address = "35 Galway Road, Durban, 4001";
    jQuery(function() {
      var map = new GMaps({
        div: '#ss_listingmap',
        lat: <?php echo $this->listing->lat; ?>,
        lng: <?php echo $this->listing->lng; ?>
      });
      
      GMaps.geocode({
        address: address,
        callback: function(results, status){
          if(status=='OK'){
            var latlng = results[0].geometry.location;
            map.setCenter(latlng.lat(), latlng.lng());
            map.addMarker({
              lat: latlng.lat(),
              lng: latlng.lng()
            });
          }
        }
      });
      
      jQuery('#myCarousel').carousel({
        interval: 7000
      });
    });
  }
</script>