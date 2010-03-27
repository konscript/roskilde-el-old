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
        $pass = Security::hash($pass);
        return $pass;
    }

	function createProject($object, $data){
	    //check if the project was saved - if it was: do the ACL thing!
	    if ($object->save($data["Project"])) {
	
	            //WORKAROUDN TO PASS PROJECT ID
	            $data['Project']['id'] = $object->id;
	
	            // SPECIFICACL: Reassigns permission for the chosen project manager
	            $this->SpecificAcl->allow("Project", $data);
	
	            //send mail
	            //mail();
	            $msg = 'Projektet blev oprettet';
	    } else {
	            $msg = 'Projektet kunne ikke oprettes. Prøv igen.';
	    }
	    return $msg;
	}

	function add() {
		if (!empty($this->data)) {

	        //echo"<pre>";
            //print_r($this);
			$this->Project->create();
                        
                //ASSIGN ROLE ID TO PROJECT MANAGER
                $this->data['User']['role_id'] = 4;
                $this->data['User']['password'] = $this->createRandomPassword();

                //create new user
                if($this->data['User']['createNew']){
                    //Create user
                    $this->Project->User->create();

                    //check if user was succesfully created
                    if($this->Project->User->save($this->data["User"])){
                        $this->Session->setFlash('Brugeren blev oprettet');
                    }else{
                        $this->Session->setFlash('Brugeren kunne ikke oprettes');
                    }
                    
                    $this->data['Project']['user_id'] = $this->Project->User->id; //set user_id
                }else {                                 
                    $this->data['Project']['user_id'] = $this->data['User']['user_id']; //set user_id
                }

                //Create project
                $createProject = $this->createProject($this->Project, $this->data); //create project
                $this->Session->setFlash($createProject); //set status for project creation
                $this->redirect(array('action' => 'index'));    //redirect
		}
		$groups = $this->Project->Group->find('list');
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
        $roles = $this->Project->User->Role->find('list');
		$this->set(compact('groups', 'users', 'roles'));
	}

	function edit($id = null) {
		// SPECIFICACL: Project-based permission check

                //Only admin and sectionmanager are allowed to set the following fields
                if($this->Auth->user('role_id')>=2){

                }

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
		$this->set('project', $this->Project->read(null, $id));
		$this->set('projectItems', $this->Project->ProjectItem->find('all', array('conditions' => array('ProjectItem.project_id' => $id))));
		$this->set('items', $this->Project->ProjectItem->Item->find('all'));
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