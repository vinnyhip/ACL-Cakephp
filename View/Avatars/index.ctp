<div class="avatars index">
	<h2><?php echo __('Avatars');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('profile_id');?></th>
			<th><?php echo $this->Paginator->sort('filename');?></th>
			<th><?php echo $this->Paginator->sort('dir');?></th>
			<th><?php echo $this->Paginator->sort('mimetype');?></th>
			<th><?php echo $this->Paginator->sort('filesize');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($avatars as $avatar): ?>
	<tr>
		<td><?php echo h($avatar['Avatar']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($avatar['Profile']['id'], array('controller' => 'profiles', 'action' => 'view', $avatar['Profile']['id'])); ?>
		</td>
		<td><?php echo h($avatar['Avatar']['filename']); ?>&nbsp;</td>
		<td><?php echo h($avatar['Avatar']['dir']); ?>&nbsp;</td>
		<td><?php echo h($avatar['Avatar']['mimetype']); ?>&nbsp;</td>
		<td><?php echo h($avatar['Avatar']['filesize']); ?>&nbsp;</td>
		<td><?php echo h($avatar['Avatar']['created']); ?>&nbsp;</td>
		<td><?php echo h($avatar['Avatar']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $avatar['Avatar']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $avatar['Avatar']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $avatar['Avatar']['id']), null, __('Are you sure you want to delete # %s?', $avatar['Avatar']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Avatar'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
