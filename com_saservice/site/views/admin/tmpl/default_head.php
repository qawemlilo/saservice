<?php// No direct access to this filedefined('_JEXEC') or die('Restricted access');$document = &JFactory::getDocument();$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/bootstrap.min.css');$document->addStyleSheet(JURI::base() . 'components/com_saservice/asserts/css/style.css');?><div class="row-fluid">    <?php      if(!($this->layout == 'new')) :    ?>    <div class="span7">     <h1 style="padding-top: 25px;">SA Service Network Admin</h1>    </div>        <div class="span5" style="text-align: center; font-size: 14px;">      <ul class="thumbnails">       <li class="span3">        <a href="<?php echo JRoute::_('index.php?option=com_saservice&view=admin&layout=new'); ?>" class="thumbnail">          <img alt="" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/admin-add.png'; ?>" />          New        </a>       </li>       <li class="span3">        <a href="#" class="thumbnail">          <img alt="" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/admin-yes.png'; ?>" />          Edit        </a>       </li>       <li class="span3">        <a href="#" class="thumbnail">          <img alt="" src="<?php echo JURI::base() . 'components/com_saservice/asserts/img/admin-delete.png'; ?>" />          Delete        </a>       </li>      </ul>    </div>    <?php       else :    ?>    <div class="span7">      <h1 style="padding-top: 25px;">New Listing</h1>    </div>        <?php      endif;    ?></div><div class="well well-small" style="font-size: 14px;">  <ul class="unstyled inline" style="padding-bottom: 0px; margin-bottom: 0px; padding-left:0px; margin-top: 0px">    <li>      <a href="<?php echo JRoute::_('index.php?option=com_saservice&view=admin'); ?>" class="<?php if (!$this->layout) echo 'active'; ?>">Listings</a>    </li> |    <li>      <a href="<?php echo JRoute::_('index.php?option=com_saservice&view=admin&layout=categories'); ?>" class="<?php if ($this->layout == 'categories') echo 'active'; ?>">Categories</a>    </li> |    <li>      <a href="<?php echo JRoute::_('index.php?option=com_saservice&view=admin&layout=areas'); ?>" class="<?php if ($this->layout == 'areas') echo 'active'; ?>">Areas</a>    </li>  </ul></div>