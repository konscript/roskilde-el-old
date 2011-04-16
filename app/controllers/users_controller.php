<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Utils');		
	
	function beforeFilter() {
	    parent::beforeFilter();  
	    $this->Auth->allow('login');
	    $this->Auth->allow('logout');
	}	
	
	function login() {
		$this->set('title_for_layout', 'Log Ind');	
		if ($this->Auth->user()) {
			$this->Session->setFlash('Du er allerede logget ind.', 'default', array('class' => 'notice'));
		}
	}   
	 
	function logout() {
		$this->set('title_for_layout', 'Log Ud');	
		$this->Session->setFlash('Du er nu logget ud.', 'default', array('class' => 'notice'));
		$this->redirect($this->Auth->logout());
	}

	function index() {
	
        $this->paginate = array(
            'recursive' => -1,
            'limit' => 25,
            'order' => array(
                'User.title' => 'asc'
            )
        );	  
	
	    /* a group manager has limited access - only view project managers in his group */
	    if($this->Auth->user('role_id') == 3 ){
	        //get current users group_id
            $groups = $this->User->Group->find("first", array(
                "conditions" => array("Group.user_id"=>$this->Auth->user('id')),
                "fields"=>"Group.id",
                "recursive"=>-1
            ));                            
	
	        //get user_id on project managers from current group
            $projects = $this->User->Group->Project->find("list", array(
	            "conditions"=>array("Project.group_id"=>$groups["Group"]["id"]),
	            "fields"=>"Project.user_id",
	            "recursive"=>-1
	        ));
	        
	        //add conditions to paginate
            $this->paginate = array(
	            "conditions" => array("User.id"=>$projects)
            );	    	        
	    }	 
	    	
		$this->set('title_for_layout', 'Alle Brugere');	
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Bruger');
		//$this->User->recursive = 2;		
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
			        	$this->Session->setFlash(sprintf(__('%s er blevet gemt, men der opstod en fejl ved afsendelse af e-mail.', true), 'Brugeren'), 'default', array('class' => 'notice'));
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
		
		//only allow users to create other users with permissions similar to their own
		$roles = $this->User->Role->find('list', array('conditions' => array('Role.id >=' => $this->Auth->user('role_id'))));
		$this->set('roles', $roles);
	}

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Bruger');	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldig %s.', true), 'bruger'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		
			//password shall not be changed
			if($this->data['User']['changePassword']==0){
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
		$this->set('roles', $this->User->Role->find('list'));
	}

	function profile() {
		$this->set('title_for_layout', 'Rediger Profil');
			
		if (!empty($this->data)) {
			$this->data['User']['role_id'] = $this->Auth->user('role_id');
			$this->data['User']['id'] = $this->Auth->user('id');		
			
			//password shall not be changed
			if($this->data['User']['changePassword']==0){
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
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		if (!empty($this->data['Project']) || !empty($this->data['Group']) || !empty($this->data['Section'])) {
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
