<?php
echo $this->Session->flash();
echo $this->Session->flash('auth');

echo 'Página inicial';

echo $this->Html->link('Testando Link', '/users/index', array('class' => 'button', 'target' => '_self'));
?>
