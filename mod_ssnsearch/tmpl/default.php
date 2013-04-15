<?php 
defined('_JEXEC') or die('Restricted access'); // no direct access 

$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
$style = '  
  ul.dropdown-menu {
    width: 380px !important;
  }
  
  .module h3.module-title {
    margin-bottom: 0px !important;
  }
';
$document->addStyleDeclaration($style);
?>

<div class="well" style="border: 1px solid #B8B8B8;">
  <form id="saservice-search" method="post" name="saservice-search" action="<?php echo JRoute::_('index.php?option=com_saservice&view=listings'); ?>">
    <input type="text" name="service" data-items="8" data-provide="typeahead" autocomplete="off" id="service-field" placeholder="e.g: Plumber" style="color: #1E598D; padding: 10px; height: 30px; font-size:24px; width:350px; margin-right: 20px; border: 1px solid #B8B8B8;" data-source='<?php echo $categoriesArray; ?>' />
    <input type="text" name="user-search" id="location-field" placeholder="e.g: Morningside, durban" style="color: #1E598D; border: 1px solid #B8B8B8; padding: 10px; font-size:24px; width:450px; height: 30px;" />
    
    <?php echo JHtml::_('form.token'); ?>
    <input id="administrative_area_level_1" name="administrative_area_level_1" type="hidden" />
    <input id="formatted_address" name="formatted_address" type="hidden">
    <input id="locality" name="locality" type="hidden" />
    <input id="sublocality" name="sublocality" type="hidden" />
    <button type="submit" class="btn btn-large" style="color: #202020; border: 1px solid #B8B8B8;" id="submit-search-query">
        <img src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/images/search_64x64.png'?>" style="width:40px" title="Search" alt="Search" />
    </button>
  </form>
</div>

<script>window.jQuery || document.write('<script src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/jquery.js' ?>"><\/script>')</script>
<script src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/bootstrap-typeahead.js'; ?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/jquery.geocomplete.min.js'; ?>"></script>
<script>
    jQuery.noConflict();
    
    (function($){
        var input = document.createElement('input'), service, location;
        
		$('.typeahead').typeahead();
        
        $("#location-field").on('focus', function () {
            if (!$('#service-field').val() || $('#service-field').val() === 'Service') {
               $('#service-field').focus();
            }
        });
        
        $('#submit-search-query').on('click', function () {
            $('#location-field').trigger('geocode');
            return false;
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
