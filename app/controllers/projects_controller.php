<?php
class ProjectsController extends AppController {

    var $name = 'Projects';
    var $components = array('SpecificAcl', 'Utils', 'Attachment', 'Excel');
    var $helpers = array('Form', 'DatePicker');
    var $paginate = array(
    		'Project' => array(
    			'limit' => 20),
    		'ProjectItem' => array(
    			'limit' => 20)    		
    		);

    function createExcel($id = null){
        if ($id) {
			
			// SPECIFICACL: Project-based permission check
			if (!$this->SpecificAcl->check("Project", $id)) {
				$this->Session->setFlash('Du har ikke adgang til projektet', 'default', array('class' => 'error'));			
				$this->redirect(array('action' => 'index'));			
			}
        
            $this->Project->recursive = 2;
            $data = $this->Project->read(null, $id);
            
            // generate the Excel sheet!
            $this->Excel->createExcel($data);

            //$this->set('project', $data);
        }
    }
	
	function index() {	
		$this->set('title_for_layout', 'Mine Projekter');		

		// restrict the associated data fetched using recursive levels
		$this->Project->recursive = 0; 

		// restrict the associated data fetched using containable behaviour
		$this->Project->contain(array('Group', 'User'));		
				
		$allowed_project_ids = $this->SpecificAcl->allowedProjects();
	    $allowed_projects = $this->paginate('Project', array('Project.id' => $allowed_project_ids));
		
		//pass data to view
		$this->set('projects', $allowed_projects);
		
		if (count($allowed_projects) == 1 && $this->Auth->user('role_id') == 4) {
			$this->redirect(array('action' => 'view', $allowed_projects["0"]["Project"]["id"]));
		}

	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Projekt');
		
		// restrict the associated data fetched using recursive levels		
		$this->Project->recursive = 2;		

		// SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('Du har ikke adgang til projektet', 'default', array('class' => 'error'));			
			$this->redirect(array('action' => 'index'));			
		}
		
		// throw error message and redirect if no id is supplied
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt %s.', true), 'projekt'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}
		
		// restrict the associated data fetched using containable behaviour
		$this->Project->contain(array('Group', 'User', 'CreatedBy', 'ModifiedBy'));
		
		// save to view variable: paginate associated project items
	    $project_items = $this->paginate($this->Project->ProjectItem, array('ProjectItem.project_id' => $id));

		$project = $this->Project->read(null, $id);

		$this->set(compact('project', 'project_items'));
	}

	function add() {
		$this->set('title_for_layout', 'Opret nyt Projekt');

		// proceed if data is supplied in the form
		if (!empty($this->data)) {
			
			// create new project entry and set default values
			$this->Project->create();
            $this->data['Project']['total_power_usage'] = 0;
            $this->data['Project']['total_power_allowance'] = 0;
            $this->data['Project']['status'] = 0;
            
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
			        	$this->Session->setFlash(sprintf(__('%s er blevet gemt og brugeren er blevet oprettet, men der opstod en fejl ved afsendelse af e-mail.', true), 'Projektet'), 'default', array('class' => 'notice'));
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
        $allowed_groups = $this->Project->Group->find('list', array('conditions' => array('Group.id' => $allowed_group_ids)));

        $users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
        $roles = $this->Project->User->Role->find('list');

        $this->set(compact('groups', 'users', 'roles', 'allowed_groups'));
    }

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Projekt');	

        // SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('Du har ikke adgang til projektet', 'default', array('class' => 'error'));					$this->redirect(array('action' => 'index'));			
		}

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Ugyldigt %s.', true), 'projekt'), 'default', array('class' => 'notice'));
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->data)) {
			
			$olddata = $this->Project->read(null, $id);	        

            // upload image
            if($this->data['Project']['uploadAttachment'] && $this->data['Project']['Attachment']['error'] != 4) {
                $this->data['Project']['file_path'] = $this->Attachment->upload($this->data['Project']['Attachment']);
            }
			
			if ($this->Project->save($this->data)) {
		        
		        // SPECIFICACL: Removes permission for old and reassigns permission for the chosen project manager
				$this->SpecificAcl->deny("Project", $olddata);
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
		
		// SPECIFICACL: Save only allowed project ids to array		
		$allowed_group_ids = $this->SpecificAcl->index("Group", $this->Project->Group->find('all'));
	  	$groups = $this->Project->Group->find('list', array('conditions' => array('Group.id' => $allowed_group_ids)));
		
	    $project_items = $this->paginate($this->Project->ProjectItem, array('ProjectItem.project_id' => $id));
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
		$project = $this->Project->read(null, $id);
		
		$this->set(compact('project', 'groups', 'users', 'project_items'));
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
