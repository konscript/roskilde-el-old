<?php
class PagesController extends AppController {

	var $name = 'Pages';

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allow('display');
	}

}
?>