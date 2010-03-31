<?php
class AppController extends Controller {

    var $components = array('Acl', 'Auth', 'Session');

    function beforeFilter() {
        // Configure AuthComponent (for Authentication and ACL)
        $this->Auth->authorize = 'actions';
		$this->Auth->actionPath = 'Application/Controllers/';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'index');
        $this->Auth->authError = "Du har ikke rettigheder til den pågældende handling/ressource.";
        $this->Auth->loginError = "Baahh, du har angivet et forkert brugernavn eller adgangskode.";    
    }
    
}
?>