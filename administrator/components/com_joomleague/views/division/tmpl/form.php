<?php defined('_JEXEC') or die('Restricted access');?>
<form action="index.php" method="post" id="adminForm">
	<div class="col50">
		<?php
		echo JHTML::_('tabs.start','tabs', array('useCookie'=>1));
		echo JHTML::_('tabs.panel',JText::_('COM_JOOMLEAGUE_TABS_DETAILS'), 'panel1');
		echo $this->loadTemplate('details');

		echo JHTML::_('tabs.end');
		?>
		<div class="clr"></div>

		<input type="hidden" name="option" value="com_joomleague" /> 
		<input type="hidden" name="cid[]" value="<?php echo $this->division->id; ?>" /> 
		<input type="hidden" name="project_id" value="<?php echo $this->projectws->id; ?>" /> 
		<input type="hidden" name="task" value="" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</div>
</form>
