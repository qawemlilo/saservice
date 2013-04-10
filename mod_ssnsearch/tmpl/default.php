<?php 
defined('_JEXEC') or die('Restricted access'); // no direct access 

$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_ssnsearch/asserts/css/bootstrap.min.css');
$style = '  
  ul.dropdown-menu {
    width: 380px !important;
  }
';
$document->addStyleDeclaration($style);
?>

<div class="well">
  <form id="saservice-search" method="post" name="saservice-search" action="<?php echo JRoute::_('index.php?option=com_saservice&view=listings'); ?>">
    <img src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/images/search_64x64.png'?>" style="width:42px" title="Search" alt="Search" />
    
    <input type="text" name="service" data-items="8" data-provide="typeahead" autocomplete="off" id="service-field" placeholder="Service " style="padding: 10px; height: 30px; font-size:24px; width:350px; margin-right: 20px;" data-source='<?php echo $categoriesArray; ?>' />
    <input type="text" name="location" id="location-field" placeholder="Your location or address" style="padding: 10px; font-size:24px; width:450px; height: 30px;" />
    
    <?php echo JHtml::_('form.token'); ?>
    <input id="administrative_area_level_1" name="administrative_area_level_1" type="hidden" />
    <input id="locality" name="locality" type="hidden" />
    <input id="sublocality" name="sublocality" type="hidden" />
  </form>
</div>

<script>window.jQuery || document.write('<script src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/jquery.js' ?>"><\/script>')</script>
<script>document.write('<script src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/bootstrap-typeahead.js' ?>"><\/script>')</script>
<script>document.write('<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"><\/script>')</script>
<script>document.write('<script src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/jquery.geocomplete.min.js' ?>"><\/script>')</script>
<script>
    (function($){
        var input = document.createElement('input'), service, location;
        
		$('.typeahead').typeahead();
        
        $("#location-field").on('focus', function () {
            if (!$('#service-field').val() || $('#service-field').val() === 'Service') {
               $('#service-field').focus();
            }
        });
        
        $("#location-field")
          .geocomplete({
              componentRestrictions: {country: 'za'},
              details: '#saservice-search'
          })
          .bind("geocode:result", function(event, result) {
              $("#location-field").val(result.formatted_address);
              $("#saservice-search").submit();            
          });
          
        if (!('placeholder' in input)) {
            service = $('#service-field'); 
            location = $('#location-field');
            
            service.val('Service');
            location.val('Your location or address');
            
            service.focus(function () {
                service.val('');  
            })
            .blur(function () {
                if (!service.val()) {
                    service.val('Service');
                }
            });
            
            location.focus(function () {
                location.val('');  
            })
            .blur(function () {
                if (!location.val()) {
                    location.val('Your location or address');
                }
            });
        }
    })(jQuery);
</script>
