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
    
    <input type="text" name="service" data-items="8" data-provide="typeahead" autocomplete="off" id="service-field" placeholder="Service" style="padding: 10px; height: 30px; font-size:24px; width:350px; margin-right: 20px;" data-source='["Electricians","Plumbing / Geyser","Satellite","Pool Services","Garden Services","Security","Airconditioning","Auto Glass","Courier","Attorneys","Gyaenacologists","Orthodontists","Paeditricians","Kitchen","Home Automation","Interior Decorators","Blinds & Curtains","Veternerian","Dog Parlour","Transport","Computers","Wedding Planners","Car Sales","Painting Companies","Developers","Buliding Contractors","Paving","Aluminium Windows","Roofing","Tiler","Electric Fencing ","Fencing","Conveyancers","Electronics","Bond Originators","Pest control","Hygeine","Plan drawers","Architect","Quantity survayors","Escourt Agencies","Scafolding","Carport","Landscaping","Shipping","Flooring","Insurance","Website Designers","Corporate Gifts","Advertising ","Printing","Loan Companies","Travel Agencies","Lighting","Party Planners","IT Companies","Day Care / Creche","Tyres","Furniture","Engineering ","Bed & Breakfast","Lodges","Guarding","Cctv","Flowers","Driving Schools","Catorers","Forklift","Local Papers","Private Tutors","Dermatologists","Gyms","Personal Trainers","Dietician","Radiologists","Photography","Audio Companies","Spas","Cardiologists","Service Garages","Shuttle / Tours","Rental Agencies","Estate Agents","Panel Beaters","Letting Agencies","Managing Agents","Car Rental","Glass Companies","Tool hire","Accountants","Gate Automation","Appliance Repairs","Taxi","Locksmiths","Retirement Homes","Kitchen Fittings","Cab Services","Safety Clothing","Funeral Houses","Halaal Restuarants","Private Schools","Carpeting"]'/>
    
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
