<?php
class PagesController extends AppController {

	var $name = 'Pages';
    var $uses = array('User');

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allow('display');
	}

	function display() {
		$this->redirect(array('controller' => 'projects', 'action' => 'index'));				
	}

}
?>