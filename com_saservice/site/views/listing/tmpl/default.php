<?php
/**
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
$document->addScript('http://maps.google.com/maps/api/js?sensor=true');
$document->addScript(JURI::base() . 'components/com_saservice/asserts/js/maps.js');
?>

<div class="row-fluid" id="ss_listing">
  <div class="span8">
    <div class="row-fluid">
      <p><i class="icon-tags"></i> <span class="label">Web design</span> <span class="label label-success">Web Development</span> <span class="label label-warning">Hosting</span></p>
      
      <h1>Scott Web Design</h1>
      
      <h3 style="margin:-8px 0px 20px 0px;">Affordable Website Design</h3>


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
    
      <h2>What We Do</h2>
      <p>Looking for that all illusive affordable website solution? You have come to the right place to find affordable website and branding solutions for your business. We strive to work with your budget to give you an affordable solution for your business needs. We hope to hear from you soon.</p>
    
      <h2>About Us</h2>
      <p>Scott Web Designs Studio's was established in early 2009 by young energetic entrepreneur Scott. With the aim of creating high quality websites to small to medium sized business at affordable rates. Service delivery is number one on our list, as most South Africans can relate to poor service & how frustrating it can be..We believe in one on one service and listening to your needs as a business and formulating a package and price that will suite you & your business. We have had extensive experience in the design & web design fields, and we keep learning new skills each day that benefit our clients. We keep up to date with the latest technology and design trends, so you always get something that is fresh and pleasing to the eyes, & wallet. So don't hesitate to contact us today to find out how we can assist you with your project.</p>
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
      <img src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/logo.png'; ?>" />
    </div>
    <h3>Location</h3>
    <div class="well" style="margin: 5px; padding: 5px; margin-top: 10px">
      <div id="ss_listingmap" style="height: 200px;">
      
      </div>
    </div>
    <h3>Contact Details</h3>
    <div class="row-fluid">
      <ul class="nav nav-list" style="margin-top: 0px">
        <li><a href="mailto:info@scottwebdesigns.co.za" target="_blanck"><i class="icon-envelope"></i> info@scottwebdesigns.co.za</a></li>
        <li><i class="icon-comment"></i> 031 309 2226</li>
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
        lat: -12.043333,
        lng: -77.028333
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