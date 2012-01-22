<div class="profiles view">
<h2><?php  echo __('Profile');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profile['User']['name'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mes Nascimento'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['mes_nascimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dia Nascimento'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['dia_nascimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fone'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['fone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $profile['Profile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile'), array('action' => 'delete', $profile['Profile']['id']), null, __('Are you sure you want to delete # %s?', $profile['Profile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avatars'), array('controller' => 'avatars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avatar'), array('controller' => 'avatars', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Avatars');?></h3>
	<?php if (!empty($profile['Avatar'])):?>
		<dl>
			<dt><?php echo __('Id');?></dt>
		<dd>
	<?php echo $profile['Avatar']['id'];?>
&nbsp;</dd>
		<dt><?php echo __('Profile Id');?></dt>
		<dd>
	<?php echo $profile['Avatar']['profile_id'];?>
&nbsp;</dd>
		<dt><?php echo __('Filename');?></dt>
		<dd>
	<?php echo $profile['Avatar']['filename'];?>
&nbsp;</dd>
		<dt><?php echo __('Dir');?></dt>
		<dd>
	<?php echo $profile['Avatar']['dir'];?>
&nbsp;</dd>
		<dt><?php echo __('Mimetype');?></dt>
		<dd>
	<?php echo $profile['Avatar']['mimetype'];?>
&nbsp;</dd>
		<dt><?php echo __('Filesize');?></dt>
		<dd>
	<?php echo $profile['Avatar']['filesize'];?>
&nbsp;</dd>
		<dt><?php echo __('Created');?></dt>
		<dd>
	<?php echo $profile['Avatar']['created'];?>
&nbsp;</dd>
		<dt><?php echo __('Updated');?></dt>
		<dd>
	<?php echo $profile['Avatar']['updated'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Avatar'), array('controller' => 'avatars', 'action' => 'edit', $profile['Avatar']['id'])); ?></li>
			</ul>
		</div>
	</div>
	