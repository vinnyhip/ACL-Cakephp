<div class="profiles form">
<?php echo $this->Form->create('Profile', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Add Profile'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
                echo $this->Form->input('Avatar.filename', array('type' => 'file'));
                echo $this->Form->input('Avatar.dir', array('type' => 'hidden'));
                echo $this->Form->input('Avatar.mimetype', array('type' => 'hidden'));
                echo $this->Form->input('Avatar.filesize', array('type' => 'hidden'));
                
		echo $this->Form->input('email');
		echo $this->Form->input('mes_nascimento');
		echo $this->Form->input('dia_nascimento');
		echo $this->Form->input('fone');
		echo $this->Form->input('celular');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avatars'), array('controller' => 'avatars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avatar'), array('controller' => 'avatars', 'action' => 'add')); ?> </li>
	</ul>
</div>
