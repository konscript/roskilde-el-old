<?php
echo $form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
echo $form->input('User.username', array('label' => 'Brugernavn (e-mail)'));
echo $form->input('User.password', array('label' => 'Adgangskode'));
echo $form->end('Log Ind');
?>