<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $components = array('SpecificAcl', 'Email');
	
	function index() {
		$this->Project->recursive = 0;		
		// SPECIFICACL: Save only allowed project ids to array		
		$allowed_project_ids = $this->SpecificAcl->index("Project", $this->paginate());

		$allowed_projects = $this->Project->find('all', array('conditions' => array('Project.id' => $allowed_project_ids)));
		$this->set('projects', $allowed_projects);
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username')));
		$this->set(compact('users'));

	}

	function view($id = null) {
		// SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('You dont have access to this project!');
			$this->redirect(array('action' => 'index'));			
		}	

		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'project'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
		$this->set('projectItems', $this->Project->ProjectItem->find('all', array('conditions' => array('ProjectItem.project_id' => $id))));
		$this->set('items', $this->Project->ProjectItem->Item->find('all'));
	}



        function createRandomPassword() {

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
            return $pass;
        } 


	function add() {
		if (!empty($this->data)) {

                    //echo"<pre>";
                    //print_r($this->data);
                        $this->Project->User->create();
			$this->Project->create();

                        //ASSIGN ROLE ID TO PROJECT MANAGER
                        $this->data['User']['role_id'] = 4;
                        $this->data['User']['password'] = $this->createRandomPassword();

                        //ADD USER
			if ($this->Project->User->save($this->data["User"])) {

                            //PASS USERID TO PROJECT TABLE
                            $this->data['Project']['user_id'] = $this->Project->User->id;

                            //check if the project was saved - if it was: do the ACL thing!
                            if ($this->Project->save($this->data["Project"])) {

                                    //WORKAROUDN TO PASS PROJECT ID
                                    $this->data['Project']['id'] = $this->Project->id;

                                    // SPECIFICACL: Reassigns permission for the chosen project manager
                                    $this->SpecificAcl->allow("Project", $this->data);
                                    $this->Session->setFlash(sprintf(__('%s blev oprettet', true), 'Projektet'));
                            } else {
                                    $this->Session->setFlash(sprintf(__('%s kunne ikke oprettes. Prøv igen.', true), 'Projektet'));
                            }

                            //SEND EMAIL TO NEW USER
                            $this->SwiftMailer->smtpType     = 'tls';
                            $this->SwiftMailer->smtpHost     = 'smtp.gmail.com';
                            $this->SwiftMailer->smtpPort     = 465;
                            $this->SwiftMailer->smtpUsername = 'louv88';
                            $this->SwiftMailer->smtpPassword = 'heyzan';
                            $this->SwiftMailer->from         = 'louv88@gmail.com';
                            $this->SwiftMailer->fromName     = 'My Name';
                            $this->SwiftMailer->to           = "la@laander.com";

                            $this->set(array(
                                'username' => $this->data['User']['username'],
                                'password' => $this->data['User']['password'],
                            ));

                            if (!$this->SwiftMailer->send('register', 'Thanks for Registering!')) {
                                $this->log('Error sending email "register".', LOG_ERROR);
                            }



                            $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('%s kunne ikke oprettes.', true), 'Brugeren'));
			}                       
		}
		$groups = $this->Project->Group->find('list');
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
                $roles = $this->Project->User->Role->find('list');
		$this->set(compact('groups', 'users', 'roles'));

	}

	function edit($id = null) {
		// SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('You dont have access to this project!');
			$this->redirect(array('action' => 'index'));			
		}

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'project'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
	        // SPECIFICACL: Removes permission for the old project manager
			$this->SpecificAcl->deny("Project", $this->Project->read(null, $id));						

			if ($this->Project->save($this->data)) {
		        // SPECIFICACL: Reassigns permission for the chosen project manager
				$this->SpecificAcl->allow("Project", $this->data);			

				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'project'));
				$this->redirect(array('action' => 'index'));		
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'project'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$groups = $this->Project->Group->find('list');
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
		$this->set(compact('groups', 'users'));
		$this->set('projectItems', $this->Project->ProjectItem->find('all', array('conditions' => array('ProjectItem.project_id' => $id))));
	}

	function delete($id = null) {
		// SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('You dont have access to this project!');
			$this->redirect(array('action' => 'index'));			
		}		

		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'project'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Project'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Project'));
		$this->redirect(array('action' => 'index'));
	}
}
?>