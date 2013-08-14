<?php
/**
 * @copyright	Copyright (C) 2007-2013 JoomLeague.net. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');

class JFormFieldSeasons extends JFormField
{

	protected $type = 'seasons';

	protected function getInput() {
		$db = &JFactory::getDBO();
		$lang = JFactory::getLanguage();
		$extension = "com_joomleague";
		$source = JPath::clean(JPATH_ADMINISTRATOR . '/components/' . $extension);
		$lang->load($extension, JPATH_ADMINISTRATOR, null, false, false)
		||	$lang->load($extension, $source, null, false, false)
		||	$lang->load($extension, JPATH_ADMINISTRATOR, $lang->getDefault(), false, false)
		||	$lang->load($extension, $source, $lang->getDefault(), false, false);

		$query = 'SELECT t.id, t.name FROM #__joomleague_season t ORDER BY name DESC';
		$db->setQuery( $query );
		$teams = $db->loadObjectList();
		$mitems = array(JHtml::_('select.option', 0, JText::_('COM_JOOMLEAGUE_GLOBAL_SELECT')));

		foreach ( $teams as $team ) {
			$mitems[] = JHtml::_('select.option',  $team->id, '&nbsp;'.$team->name. ' ('.$team->id.')' );
		}

		$output= JHtml::_('select.genericlist',  $mitems, $this->name.'[]', 'class="inputbox" multiple="" size="10"', 'value', 'text', $this->value, $this->id );
		return $output;
	}
}
