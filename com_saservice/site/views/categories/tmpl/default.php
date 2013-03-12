<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$cats = array("Electricians", "Plumbing / geyser", "Satellite", "Pool services", "Garden services", "Security", "Airconditioning", "Auto glass", "Courier", "Attorneys", "Gyaenacologists", "Orthodontists", "Paeditricians", "Kitchen", "Home automation", "Interior decorators", "Blinds & curtains", "Veternerian", "Dog parlour", "Transport", "Computers", "Wedding planners", "Car sales", "Painting companies", "Developers", "Buliding contractors", "Paving", "Aluminium windows", "Roofing", "Tiler", "Electric fencing ", "Fencing", "Conveyancers", "Electronics", "Bond originators", "Pest control", "Hygeine", "Plan drawers", "Architect", "Quantity survayors", "Escourt agencies", "Scafolding", "Carport", "Landscaping", "Shipping", "Flooring", "Insurance", "Website designers", "Corporate gifts", "Advertising ", "Printing", "Loan companies", "Travel agencies", "Lighting", "Party planners", "IT companies", "Day care / creche", "Tyres", "Furniture", "Engineering ", "Bed & breakfast", "Lodges", "Guarding", "Cctv", "Flowers", "Driving schools", "Catorers", "Forklift", "Local papers", "Private tutors", "Dermatologists", "Gyms", "Personal trainers", "Dietician", "Radiologists", "Photography", "Audio companies", "Spas", "Cardiologists", "Service garages", "Shuttle / tours", "Rental agencies", "Estate agents", "Panel beaters", "Letting agencies", "Managing agents", "Car rental", "Glass companies", "Tool hire", "Accountants", "Gate automation", "Appliance repairs", "Taxi", "Locksmiths", "Retirement homes", "Kitchen fittings", "Cab services", "Safety clothing", "Funeral houses", "Halaal restuarants", "Private schools", "Carpeting ", "Sundecks");

$limit = ceil(count($cats) / 3);
$counter = 0;
?>

<h1>Categories</h1>
<div class="row-fluid">
<?php 
  foreach($cats as $cat) {
    if ($counter == $limit) {
      echo '<div class="span4"><ul class="unstyled">';
    }
    
    echo "<li>{$cat}</li>";

    if ($counter == $limit) {
      echo '</ul></div>';
      
      $counter = 0;
    }
  }
?>
</div>
