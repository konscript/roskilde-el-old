<?php
class ProjectsController extends AppController {

        //temp for testing image uplaoder
	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('createimage_step2');
            $this->Auth->allow('createimage_step3');
	}

	var $name = 'Projects';
	var $components = array('SpecificAcl', 'Utils', 'JqImgcrop');
	var $helpers = array('Form', 'DatePicker', 'Cropimage');

	// Private method for creating random passwords (not used directly as an action)
	// Returns array: 0 => hashed, 1 => cleartext
    function createRandomPassword() {
        // generate random string and save to variable
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '';
        while ($i <= 10) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        
        // encrypt the password using CakePHP hash function
        $hash = Security::hash($pass);
        
        // return array of hashed password and cleartext
        $array = array($hash, $pass);
        return $array;
    }

	// Private method for creating projects (not used directly as an action)
	// Returns true/false if successful/failed
	function createProject($object, $data){
	    // check if the project was saved - if it was: do the ACL thing!
	    if ($object->save($data["Project"])) {
	
            // workaround to pass project id
            $data['Project']['id'] = $object->id;

            // SPECIFICACL: Reassigns permission for the chosen project manager
            $this->SpecificAcl->allow("Project", $data);

            // send mail
            // mail();
            return true;
	    } else { return false; }
	}


	function index() {
		$this->set('title_for_layout', 'Mine Projekter');
		$this->Project->recursive = 0;		

		// SPECIFICACL: Save only allowed project ids to array		
		$allowed_project_ids = $this->SpecificAcl->index("Project", $this->Project->find('all'));

		// setup pagination for allowed projects only
	    	$this->paginate = array('conditions' => array('Project.id' => $allowed_project_ids), 'limit' => 10);
	   	 $allowed_projects = $this->paginate('Project');
		$this->set('projects', $allowed_projects);                
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Projekt');

		// SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('Du har ikke adgang til projektet');			
			$this->redirect(array('action' => 'index'));			
		}
		
		// throw error message and redirect if no id is supplied
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt %s.', true), 'projekt'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}

		// save to variable: projects, project items and items		
		$this->set('project', $this->Project->read(null, $id));
		$this->set('projectItems', $this->Project->ProjectItem->find('all', array('conditions' => array('ProjectItem.project_id' => $id))));
		$this->set('items', $this->Project->ProjectItem->Item->find('all'));
	}

	function add() {
		$this->set('title_for_layout', 'Opret nyt Projekt');

		// proceed if data is supplied in the form
		if (!empty($this->data)) {
			
			// create new project entry
			$this->Project->create();

            $this->data['Project']['total_power_usage'] = 0;
                        			
            // creating a new user if the option is chosen
            if($this->data['User']['createNew']) {

				$this->Project->set($this->data);
	            if ($this->Project->validates()) {
	            
		            // set role_id to project manager (4) and create random password and assign variable (password array: 0 => hashed, 1 => cleartext)
		            $this->data['User']['role_id'] = 4;
					$password = $this->Utils->createRandomPassword();
					$this->data['User']['password'] = $password[0];
	                
	                // create new user entry
	                $this->Project->User->create();
	
	                // check if user was succesfully created
	                if ($this->Project->User->save($this->data["User"])) {			
		                $this->data['Project']['user_id'] = $this->Project->User->id; //set user_id				
		                $user_outcome = true;
	                } else {
		                $user_outcome = false;
	                }
	                
	                if ($user_outcome == true) {
		                // sending e-mail to new user
						$name = $this->data['User']['title'];
						$email = $this->data['User']['username'];
						$mail_result = $this->_userMail($name, $email, $password[1]);
						if ($mail_result) {
			                $email_outcome = true;
						} else {				
			                $email_outcome = false;						
						}
					}
				
				} else {
					$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Projektet'), 'default', array('class' => 'error'));	
				}
			
			// using existing user
            } else {
                $this->data['Project']['user_id'] = $this->data['User']['user_id']; //set user_id
            }

            // new user, user is OK
            if (isset($user_outcome) && $user_outcome == true) {
            	$project_outcome = $this->Utils->createProject($this->Project, $this->data);
            	// project is OK
            	if ($project_outcome == true) {
					// email is OK
					if (isset($email_outcome) && $email_outcome == true) {
						$this->Session->setFlash(sprintf(__('%s er blevet gemt, brugeren er blevet oprettet og har fået tilsendt en e-mail!', true), 'Projektet'), 'default', array('class' => 'success'));            
            			$this->redirect(array('action' => 'index'));
            		// email failed
            		} else if (isset($email_outcome) && $email_outcome == false) {
			        	$this->Session->setFlash(sprintf(__('%s er blevet gemt og brugeren er blevet oprettet, men der kunne ikke tilsendes en e-mail. Nulstil venligst adgangskoden manuelt og kontakt brugeren selv.', true), 'bruger'), 'default', array('class' => 'notice'));
						$this->redirect(array('action' => 'index'));            		
					}	
				// project failed
	            } else {
					$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Projektet'), 'default', array('class' => 'error'));
	            }
	        // new user, user failed
	        } else if (isset($user_outcome) && $user_outcome == false) {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Brugeren'), 'default', array('class' => 'error'));
	        // existing user
	        } else if (!isset($user_outcome)) {
            	$project_outcome = $this->Utils->createProject($this->Project, $this->data);
            	// project is OK
            	if ($project_outcome == true) {
					$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Projektet'), 'default', array('class' => 'success')); 
            		$this->redirect(array('action' => 'index'));            			
				// project failed
				} else {
					$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Projektet'), 'default', array('class' => 'error'));
				}
	        }
	    }

		// SPECIFICACL: Save only allowed project ids to array		
		$allowed_group_ids = $this->SpecificAcl->index("Group", $this->Project->Group->find('all'));

		// setup pagination for allowed projects only
	  	$allowed_groups = $this->Project->Group->find('list', array('conditions' => array('Group.id' => $allowed_group_ids)));
		$this->set('allowed_groups', $allowed_groups);
		
		// save to variable: groups, users and roles				
		// $groups = $this->Project->Group->find('list');
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
        $roles = $this->Project->User->Role->find('list');
		$this->set(compact('groups', 'users', 'roles'));
	}


        //upload image function
        function createimage_step2(){
            if (!empty($this->data)) {
                $uploaded = $this->JqImgcrop->uploadImage($this->data['Project']['image'], '/img/upload/', 'prefix_');
                $this->set('uploaded',$uploaded);
            }
        }

        //crop image
        function createimage_step3(){
            $this->JqImgcrop->cropImage(
                    151, //thumb width
                    $this->data['Project']['x1'], //x1 (coordinate)
                    $this->data['Project']['x2'], //x2
                    $this->data['Project']['y1'], //y1
                    $this->data['Project']['y2'], //y2
                    $this->data['Project']['w'],
                    $this->data['Project']['h'],
                    $this->data['Project']['imagePath'], //thumb location
                    $this->data['Project']['imagePath'] //image location
                    );
        }

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Projekt');	
		unset($this->data['Project']['modified']);

        // SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('Du har ikke adgang til projektet');			
			$this->redirect(array('action' => 'index'));			
		}

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldigt %s.', true), 'projekt'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->data)) {
	        // SPECIFICACL: Removes permission for the old project manager
				$this->SpecificAcl->deny("Project", $this->Project->read(null, $id));						

			if ($this->Project->save($this->data)) {
		        // SPECIFICACL: Reassigns permission for the chosen project manager
				$this->SpecificAcl->allow("Project", $this->data);			
				$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Projektet'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));		
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Projektet'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
        // pass current users role to view
        $role_id = $this->Auth->user('role_id');

		// SPECIFICACL: Save only allowed project ids to array		
		$allowed_group_ids = $this->SpecificAcl->index("Group", $this->Project->Group->find('all'));
		// setup pagination for allowed projects only
		// $groups = $this->Project->Group->find('list');
	  	$groups = $this->Project->Group->find('list', array('conditions' => array('Group.id' => $allowed_group_ids)));
		
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
		$project = $this->Project->read(null, $id);
		$projectItems = $this->Project->ProjectItem->find('all', array('conditions' => array('ProjectItem.project_id' => $id)));
		$items = $this->Project->ProjectItem->Item->find('all');
		$this->set(compact('groups', 'users', 'role_id', 'project', 'projectItems', 'items'));
	}

	function delete($id = null) {
		$this->set('title_for_layout', 'Slet Projekt');	
		// SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('Du har ikke adgang til projektet');			
			$this->redirect(array('action' => 'index'));			
		}		

		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt ID for %s.', true), 'projektet'), 'default', array('class' => 'notice'));
			
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->delete($id, true)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Projektet'), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Projektet'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>
