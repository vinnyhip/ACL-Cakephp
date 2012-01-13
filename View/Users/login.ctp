<?php

echo $this->Session->flash();
echo $this->Session->flash('auth');


echo $this->Form->create('User', array('action' => 'login'));

echo $this->Form->inputs(array(
    'legend' => 'Formulário de login',
    'username',
    'password'
));

echo $this->Form->end('Enviar');