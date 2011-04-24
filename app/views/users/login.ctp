<?php
echo $form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
echo $form->input('User.username', array('label' => 'E-mail'));
echo $form->input('User.password', array('label' => 'Adgangskode'));
echo $form->end(array('value' => 'Sesame!', 'div' => array('class' => 'submit', 'id' => 'sesame')));
echo $this->Html->link('Glemt password?', array('controller' => 'users', 'action' => 'resetPassword'), array('class' => 'reset_password'));
?>