<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('MailUser', 'Email');	

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allow('login');
	    $this->Auth->allow('logout');
	    $this->Auth->allow('profile');
	}	
	
	function login() {
		$this->set('title_for_layout', 'Log Ind');	
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('Du er allerede logget ind.', 'default', array('class' => 'notice'));
			$this->redirect('/', null, false);
		}
	}   
	 
	function logout() {
		$this->set('title_for_layout', 'Log Ud');	
		$this->Session->setFlash('Du er nu logget ud.', 'default', array('class' => 'notice'));
		$this->redirect($this->Auth->logout());
	}

	function index() {
		$this->set('title_for_layout', 'Alle Brugere');	
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Bruger');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'bruger'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		$this->set('title_for_layout', 'Opret ny Bruger');	
		if (!empty($this->data)) {
			$this->User->create();
			/* $name = $this->data['User']['title'];
			$username = $this->data['User']['username'];
			$password = $this->data['User']['password'];
			if (!$this->MailUser->sendMail($name, $username, $password, 'bruger')) {
	        	$this->Session->setFlash(sprintf(__('E-mail til %s kunne ikke sendes, men brugeren er blevet oprettet', true), 'brugeren'), 'default', array('class' => 'notice'));
				$this->redirect(array('action' => 'index'));	        	
			} */
			if ($this->User->save($this->data)) {
				/*if($this->data['User']['sendEmail']) {
					$this->Email->from    = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
					$this->Email->replyTo = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
					$this->Email->to      = 'Somedude <la@laander.com>';
					$this->Email->subject = 'Roskilde Festival: Oprettet i el-system';
					$mail_outcome = $this->Email->send("Det virker!");
					if ($mail_outcome) {
						$this->Session->setFlash(sprintf(__('%s er blevet gemt og der er sendt en mail til '.$username.'!', true), 'Brugeren'), 'default', array('class' => 'success'));
					} else { */
						$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Brugeren'), 'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					/*} 
				} else {
					$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Brugeren'), 'default', array('class' => 'success'));
				}
				
				$this->redirect(array('action' => 'index')); */
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Brugeren'), 'default', array('class' => 'error'));
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Bruger');	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'bruger'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Brugeren'), 'default', array('class' => 'success'));
				
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Brugeren'), 'default', array('class' => 'error'));
				
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function profile() {
		$this->set('title_for_layout', 'Rediger Profil');	
		if (!empty($this->data)) {
			$this->data['User']['role_id'] = $this->Auth->user('role_id');
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(sprintf(__('Din %s er blevet opdateret', true), 'profil'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Profilændringerne'), 'default', array('class' => 'error'));	
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $this->Auth->user('id'));
		}
	}

	function delete($id = null) {
		$this->set('title_for_layout', 'Slet Bruger');	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt ID for %s.', true), 'brugeren'), 'default', array('class' => 'notice'));
			
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Brugeren'), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Brugeren'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>