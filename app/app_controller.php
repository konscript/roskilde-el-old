<?php
class AppController extends Controller {

    var $components = array('Acl', 'Auth', 'Session');

	// Required settings for Auth/Acl
    function beforeFilter() {
    
        //Configure AuthComponent
        $this->Auth->authorize = 'actions';
		$this->Auth->actionPath = 'Application/Controllers/';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'index');
	    //$this->Auth->allow('*');    
    
    }
    
}
?>