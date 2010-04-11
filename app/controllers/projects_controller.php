<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $components = array('SpecificAcl', 'Email');
        var $helpers = array('Form', 'DatePicker');


	function index() {
		$this->set('title_for_layout', 'Mine Projekter');
		$this->Project->recursive = 0;		
		// SPECIFICACL: Save only allowed project ids to array		
		$allowed_project_ids = $this->SpecificAcl->index("Project", $this->paginate());




		$projects = $this->Project->find('all', array('conditions' => array('Project.id' => $allowed_project_ids)));
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username')));
		$this->set(compact('users', 'projects'));
	}

	function view($id = null) {
		$this->set('title_for_layout', 'Se Projekt');
		// SPECIFICACL: Project-based permission check
		if (!$this->SpecificAcl->check("Project", $id)) {
			$this->Session->setFlash('Du har ikke adgang til projektet');			
			$this->redirect(array('action' => 'index'));			
		}	
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Ugyldigt %s.', true), 'projekt'), 'default', array('class' => 'notice'));
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
            return true;
	    } else {
            return false;
	    }
	}

	function add() {
		$this->set('title_for_layout', 'Opret nyt Projekt');
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
                        $this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Brugeren'), 'default', array('class' => 'success'));
                    }else{
                        $this->Session->setFlash(sprintf(__('%s kunne ikke gemmes.', true), 'Brugeren'), 'default', array('class' => 'error'));
                    }
                    
                    $this->data['Project']['user_id'] = $this->Project->User->id; //set user_id
                }else {                                 
                    $this->data['Project']['user_id'] = $this->data['User']['user_id']; //set user_id
                }

                //Create project
                $createProject = $this->createProject($this->Project, $this->data); //create project
                if ($createProject == true) {
					$this->Session->setFlash(sprintf(__('%s er blevet gemt!', true), 'Projektet'), 'default', array('class' => 'success'));
                } else if ($createProject == false) {
					$this->Session->setFlash(sprintf(__('%s kunne ikke gemmes. Forsøg igen.', true), 'Projektet'), 'default', array('class' => 'error'));          
                }
                $this->redirect(array('action' => 'index'));    //redirect
		}
		$groups = $this->Project->Group->find('list');
		$users = $this->Project->User->find('list', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.role_id' => 4)));
        $roles = $this->Project->User->Role->find('list');
		$this->set(compact('groups', 'users', 'roles'));
	}

	function edit($id = null) {
		$this->set('title_for_layout', 'Rediger Projekt');	
		// SPECIFICACL: Project-based permission check

                //Only admin and sectionmanager are allowed to set the following fields
                $role_id = $this->Auth->user('role_id');
                if($role_id<=2){
                }

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
		$groups = $this->Project->Group->find('list');
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
		if ($this->Project->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s er slettet.', true), 'Projektet'), 'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s kunne ikke slettes. Forsøg igen.', true), 'Projektet'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
?>
