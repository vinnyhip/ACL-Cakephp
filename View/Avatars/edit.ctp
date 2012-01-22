<div class="avatars form">
<?php echo $this->Form->create('Avatar');?>
	<fieldset>
		<legend><?php echo __('Edit Avatar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('profile_id');
		echo $this->Form->input('filename');
		echo $this->Form->input('dir');
		echo $this->Form->input('mimetype');
		echo $this->Form->input('filesize');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Avatar.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Avatar.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Avatars'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
