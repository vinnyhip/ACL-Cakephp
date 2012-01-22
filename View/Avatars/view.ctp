<div class="avatars view">
<h2><?php  echo __('Avatar');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($avatar['Avatar']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile'); ?></dt>
		<dd>
			<?php echo $this->Html->link($avatar['Profile']['id'], array('controller' => 'profiles', 'action' => 'view', $avatar['Profile']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($avatar['Avatar']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($avatar['Avatar']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mimetype'); ?></dt>
		<dd>
			<?php echo h($avatar['Avatar']['mimetype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filesize'); ?></dt>
		<dd>
			<?php echo h($avatar['Avatar']['filesize']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($avatar['Avatar']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($avatar['Avatar']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Avatar'), array('action' => 'edit', $avatar['Avatar']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Avatar'), array('action' => 'delete', $avatar['Avatar']['id']), null, __('Are you sure you want to delete # %s?', $avatar['Avatar']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Avatars'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avatar'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
