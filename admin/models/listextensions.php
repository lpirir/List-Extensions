<?php

class ListExtensionsModelListExtensions extends JModelList
{
	protected function getListQuery()
	{  
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*')
		->from($db->quoteName('#__extensions'));

		$input = JFactory::getApplication()->input;

		$status = $input->getCmd('status');

		$type = $input->getCmd('type');

		$search = $input->getCmd('search');

		if (!empty($status) && !empty($type)) {
			$like = $db->quote($type);

			$query->where(['enabled = ' . (int) $status, 'type = ' . $like]);
		} elseif (!empty($status) && empty($type)) {
			$query->where('enabled = ' . (int) $status);
		} elseif (!empty($type) && empty($status)) {
			$like = $db->quote($type);

			$query->where('type = ' . $like);
		}

		if (!empty($search)) {
			$like = $db->quote('%' . $search . '%');

			$query->where('name like ' . $like);
		}

		return $query;
	}
}