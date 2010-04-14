<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Utils');	

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

            // set role_id to project manager (4)
            $this->data['User']['role_id'] = 4;

            // generate password and send mail
            if($this->data['User']['generatePassword']) {

				// generate random password and assign variable (password array: 0 => hashed, 1 => cleartext)
				$password = $this->Utils->createRandomPassword();
				$this->data['User']['password'] = $password[0];
                
				if ($this->User->save($this->data)) {
	                // sending e-mail to new user
					$name = $this->data['User']['title'];
					$email = $this->data['User']['username'];
					$mail_result = $this->_userMail($name, $email, $password[1]);
					// email is OK
					if ($mail_result) {
						$this->Session->setFlash(sprintf(__('%s er blevet gemt og der er sendt en e-mail til brugeren.', true), 'Brugeren'), 'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					// email failed
					} else {				
			        	$this->Session->setFlash(sprintf(__('%s er blevet gemt og brugeren er blevet oprettet, men der kunne ikke tilsendes en e-mail. Nulstil venligst adgangskoden manuelt og kontakt brugeren selv.', true), 'bruger'), 'default', array('class' => 'notice'));
						$this->redirect(array('action' => 'index'));            		
					}				
				} else {
					$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Brugeren'), 'default', array('class' => 'error'));
				}
            
            // password is manually supplied, skipping mail    			
			} else {
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(sprintf(__('%s er blevet gemt.', true), 'Brugeren'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Brugeren'), 'default', array('class' => 'error'));
				}
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
			if (!$this->data['User']['changePassword']) {
				unset($this->data['User']['password']);
			}
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
			if (!$this->data['User']['changePassword']) {
				unset($this->data['User']['password']);
			}
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(sprintf(__('Din %s er blevet opdateret', true), 'profil'), 'default', array('class' => 'success'));
				$this->redirect('/', null, false);
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
		$projects = $this->User->Project->find('list', array('conditions' => array('Project.user_id' => $id)));
		$groups = $this->User->Group->find('list', array('conditions' => array('Group.user_id' => $id)));
		$sections = $this->User->Section->find('list', array('conditions' => array('Section.user_id' => $id)));
		if (!empty($projects) || !empty($groups) || !empty($sections)) {
			$this->Session->setFlash(sprintf(__('%s har tilknyttede projekter/grupper/sektioner og kan ikke slettes.', true), 'Brugeren'), 'default', array('class' => 'error'));
			$this->redirect(array('action'=>'index'));			
		} else if ($this->User->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Brugeren'), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Brugeren'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>