<?php 
defined('_JEXEC') or die('Restricted access'); // no direct access 

$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');
$style = '  
  ul.dropdown-menu {
    width: 380px !important;
  }
';
$document->addStyleDeclaration($style);
?>

<div class="well">
  <form id="saservice-search" method="get" name="saservice-search" action="<?php echo JRoute::_('index.php'); ?>">
    <img src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/images/search_64x64.png'?>" style="width:42px" title="Search" alt="Search" />
    
    <input type="text" name="service" data-items="8" data-provide="typeahead" autocomplete="off" id="service-field" placeholder="Service" style="padding: 10px; height: 30px; font-size:24px; width:350px; margin-right: 20px;" data-source='<?php echo $arr; ?>'/>
    
    <input type="text" name="location" id="location-field" placeholder="Your location or address" style="padding: 10px; font-size:24px; width:450px; height: 30px;" />
    
    <input type="hidden" name="option" value="com_saservice" />
    <input type="hidden" name="view" value="category" />
  </form>
</div>

<script type="text/javascript" src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/bootstrap-typeahead.js' ?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script type="text/javascript" src="<?php echo JURI::base() . 'modules/mod_ssnsearch/asserts/js/jquery.geocomplete.min.js' ?>"></script>
<script>
    (function($){
		$('.typeahead').typeahead();
        
        $("#location-field").on('focus', function () {
            if (!$('#service-field').val()) {
               $('#service-field').focus();
            }
        });
        
        $("#location-field")
          .geocomplete({componentRestrictions: {country: 'za'}})
          .bind("geocode:result", function(event, result) {
              $("#location-field").val(result.formatted_address);
              $("#saservice-search").submit();            
          });
    })(jQuery);
</script>
