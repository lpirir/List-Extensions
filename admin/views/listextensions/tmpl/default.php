<form action="index.php?option=com_listextensions&view=listextensions" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<td>
					<select name="status" id="status">
						<option value="">All</option>
						<option value="1">Enabled</option>
						<option value="0">Disabled</option>
					</select>
				</td>
				<td>
					<select name="type" id="type">
						<option value="">All</option>
						<option value="plugin">Plugin</option>
						<option value="template">Template</option>
						<option value="language">Language</option>
						<option value="file">File</option>
						<option value="component">Component</option>
						<option value="library">Library</option>
						<option value="module">Module</option>
					</select>
				</td>
				<td>
					<input type="search" name="search" placeholder="Search by keyword" />
				</td>
				<td>
					<button class="btn btn-primary">Search</button>
				</td>
			</tr>
		</thead>
	</table>

	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_LISTEXTENSIONS_ID'); ?></th>
			<th width="2%"><?php echo JText::_('COM_LISTEXTENSIONS_STATE'); ?></th>
			<th width="20%"><?php echo JText::_('COM_LISTEXTENSIONS_NAME'); ?></th>
			<th width="6%"><?php echo JText::_('COM_LISTEXTENSIONS_EXTENSION_TYPE'); ?></th>
			<th width="8%"><?php echo JText::_('COM_LISTEXTENSIONS_AUTHOR'); ?></th>
			<th width="3%"><?php echo JText::_('COM_LISTEXTENSIONS_VERSION'); ?></th>
			<th width="6%"><?php echo JText::_('COM_LISTEXTENSIONS_RELEASE_DATE'); ?></th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : ?>
 
					<tr>
						<td><?php echo $row->extension_id; ?></td>
						<td><?php if ($row->enabled) : ?>Enable<?php else : ?>Disabled<?php endif; ?></td>
						<td><?php echo $row->name; ?></td>
						<td align="center"><?php echo $row->type; ?></td>
						<td align="center">
							<?php $manifest = json_decode($row->manifest_cache); ?>
							<?php echo $manifest->author; ?>							
						</td>
						<td><?php echo $manifest->version; ?></td>
						<td><?php echo $manifest->creationDate; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</form>
