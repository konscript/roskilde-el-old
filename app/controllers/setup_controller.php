<?php
class SetupController extends AppController {

	var $name = 'Setup';
    var $uses = array('Section', 'Group', 'Project', 'User');

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allow('*');
	}
	
	function acl_build() 
	{
		// the following commands should be executed through the cake console to initialize the basic ACL setup for ARO + ACO
		// cake acl create aro root Requesters
		// cake acl create aro Requesters Role.1
		// cake acl create aro Requesters Role.2
		// cake acl create aro Requesters Role.3
		// cake acl create aro Requesters Role.4						
		// cake acl create aco root Application
		// cake acl create aco Application Controllers
		// cake acl create aco Application Content				
	}

	function permissions_assign_controlleractions()
	{
        // note: updates and deletes could be set at a user level (so only owners can edit or delete their items) instead!

		echo "Setting permissions for ACL:<br /><br />";

		// all users (requesters)
		$allusers = "Requesters";
		$this->Acl->allow($allusers, 'Application/Controllers/Pages/display');
		echo "- All users setup done<br />";		

		// administrators
		$administrators = array('model'=>'Role','foreign_key'=>1);
		$this->Acl->allow($administrators, 'Application');
		echo "- Administrators setup done<br />";
  		
 		// section managers
		$sectionmanagers = array('model'=>'Role','foreign_key'=>2);		
		$this->Acl->deny($sectionmanagers, 'Application');
		$this->Acl->allow($sectionmanagers, 'Application/Controllers/Users');
		$this->Acl->allow($sectionmanagers, 'Application/Controllers/Groups');
		$this->Acl->allow($sectionmanagers, 'Application/Controllers/Roles/index');
		$this->Acl->allow($sectionmanagers, 'Application/Controllers/Roles/view');		
		$this->Acl->allow($sectionmanagers, 'Application/Controllers/Projects');
		$this->Acl->allow($sectionmanagers, 'Application/Controllers/ProjectItems');
		$this->Acl->allow($sectionmanagers, 'Application/Controllers/Items');
		echo "- Section Managers setup done<br />";
					 
		// group managers
		$groupmanagers = array('model'=>'Role','foreign_key'=>3);				
		$this->Acl->deny($groupmanagers, 'Application');
		$this->Acl->allow($groupmanagers, 'Application/Controllers/Users/add');		
		$this->Acl->allow($groupmanagers, 'Application/Controllers/Projects');
		$this->Acl->allow($groupmanagers, 'Application/Controllers/ProjectItems');
		$this->Acl->allow($groupmanagers, 'Application/Controllers/Items/index');
		$this->Acl->allow($groupmanagers, 'Application/Controllers/Items/view');
		echo "- Group Managers setup done<br />";

		// project managers
		$projectmanagers = array('model'=>'Role','foreign_key'=>4);						
		$this->Acl->deny($projectmanagers, 'Application');
		$this->Acl->allow($projectmanagers, 'Application/Controllers/Projects/index');
		$this->Acl->allow($projectmanagers, 'Application/Controllers/Projects/view');
		$this->Acl->allow($projectmanagers, 'Application/Controllers/Projects/edit');
		$this->Acl->allow($projectmanagers, 'Application/Controllers/ProjectItems');
		$this->Acl->allow($groupmanagers, 'Application/Controllers/Items/index');
		$this->Acl->allow($groupmanagers, 'Application/Controllers/Items/view');						
		echo "- Project Managers setup done<br />";
		
		die("<br />All done!");
 	}
 	
	function permissions_assign_content()
	{
        // note: updates and deletes could be set at a user level (so only owners can edit or delete their items) instead!

		echo "Setting permissions for ACL:<br /><br />";

		// admin
		$user_a = array('model'=>'User','foreign_key'=>5);
		$this->Acl->allow($user_a, 'Application/Content');
		echo "- User 1 assigned<br />";

		// sectiondude
		$user_b = array('model'=>'User','foreign_key'=>6);
		$this->Acl->allow($user_b, array('model'=>'Section','foreign_key'=>1));
		echo "- User 2 assigned<br />";
  		
		// groupdude
		$user_c = array('model'=>'User','foreign_key'=>7);
		$this->Acl->allow($user_c, array('model'=>'Group','foreign_key'=>1));
		echo "- User 3 assigned<br />";
		
		// projectdude
		$user_d = array('model'=>'User','foreign_key'=>8);
		$this->Acl->allow($user_d, array('model'=>'Project','foreign_key'=>1));
		echo "- User 4 assigned<br />";
		
		die("<br />All done!");
 	}

 	 
 	// Checking permissions on certain users
	function permissions_check()
	{
		// remember, we can use the model/foreign key syntax for our user AROs
			// think: can <User/Model> <x> access <Model> ,<action>
			// can User 2356 access Weapons
			// $this->Acl->check(array('model' => 'User', 'foreign_key' => 2356), 'Weapons');

		echo "Checking permissions for users:<br /><br />";
		
		$userid = 5;
		while ($userid <= 84) {
			$stop = false;
			$username = $this->User->findById($userid);
			if ($this->Acl->check(array('model'=>'User','foreign_key'=>$userid), array('model'=>'Section','foreign_key'=>1)) == true ) {
				$sectionname = $this->Section->findById(1);
				echo "User " . $userid .' "'. $username['User']['username'] .'"'. " is section manager for Section " . $sectionname['Section']['id'] .' "'. $sectionname['Section']['title'] .'"'. "<br >";
				$stop = true;
			}
			$groupid = 1;
			while ($groupid <= 4 && $stop == false) {
				$groupname = $this->Group->findById($groupid);			
				if ($this->Acl->check(array('model'=>'User','foreign_key'=>$userid), array('model'=>'Group','foreign_key'=>$groupid)) == true ) {
					echo "User " . $userid .' "'. $username['User']['username'] .'"'. " is group manager for Group " . $groupname['Group']['id'] .' "'. $groupname['Group']['title'] .'"'. "<br >";
					$stop = true;
				}
				$groupid++;
			}
			$projectid = 1;
			while ($projectid <= 42 && $stop == false) {
				$projectname = $this->Project->findById($projectid);						
				if ($this->Acl->check(array('model'=>'User','foreign_key'=>$userid), array('model'=>'Project','foreign_key'=>$projectid)) == true ) {
					echo "User " . $userid .' "'. $username['User']['username'] .'"'. " is project manager for Project " . $projectname['Project']['id'] .' "'. $projectname['Project']['title'] .'"'. "<br >";
				}
				$projectid++;
			}
			echo "<br />";
			$userid++;
		}
		
		if ($this->Acl->check(array('model'=>'User','foreign_key'=>5), 'Application/Controllers/Pages/display') == true ) {
			echo "All users have acces to the frontpage (Pages > display)!<br /><br />";
		} else {
			echo "The users doesnt have access to the frontpage (Pages > display) - something is wrong.<br /><br />";
		}
		
		die('All done!');
	}
	

    // Builds the Aco structure (Controllers > Actions)
	function aco_build_controlleractions() {
		if (!Configure::read('debug')) {
			return $this->_stop();
		}
		$log = array();

		$aco =& $this->Acl->Aco;
		$root = $aco->node('Application/Controllers');
		if (!$root) {
			$aco->create(array('parent_id' => 1, 'model' => null, 'alias' => 'Controllers'));
			$root = $aco->save();
			$root['Aco']['id'] = $aco->id; 
			$log[] = 'Created Aco node for controllers';
		} else {
			$root = $root[0];
		}   

		App::import('Core', 'File');
		$Controllers = Configure::listObjects('controller');
		$appIndex = array_search('App', $Controllers);
		if ($appIndex !== false ) {
			unset($Controllers[$appIndex]);
		}
		$baseMethods = get_class_methods('Controller');
		$baseMethods[] = 'buildAcl';

		$Plugins = $this->_getPluginControllerNames();
		$Controllers = array_merge($Controllers, $Plugins);

		// look at each controller in app/controllers
		foreach ($Controllers as $ctrlName) {
			$methods = $this->_getClassMethods($this->_getPluginControllerPath($ctrlName));

			// Do all Plugins First
			if ($this->_isPlugin($ctrlName)){
				$pluginNode = $aco->node('controllers/'.$this->_getPluginName($ctrlName));
				if (!$pluginNode) {
					$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginName($ctrlName)));
					$pluginNode = $aco->save();
					$pluginNode['Aco']['id'] = $aco->id;
					$log[] = 'Created Aco node for ' . $this->_getPluginName($ctrlName) . ' Plugin';
				}
			}
			// find / make controller node
			$controllerNode = $aco->node('controllers/'.$ctrlName);
			if (!$controllerNode) {
				if ($this->_isPlugin($ctrlName)){
					$pluginNode = $aco->node('controllers/' . $this->_getPluginName($ctrlName));
					$aco->create(array('parent_id' => $pluginNode['0']['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginControllerName($ctrlName)));
					$controllerNode = $aco->save();
					$controllerNode['Aco']['id'] = $aco->id;
					$log[] = 'Created Aco node for ' . $this->_getPluginControllerName($ctrlName) . ' ' . $this->_getPluginName($ctrlName) . ' Plugin Controller';
				} else {
					$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $ctrlName));
					$controllerNode = $aco->save();
					$controllerNode['Aco']['id'] = $aco->id;
					$log[] = 'Created Aco node for ' . $ctrlName;
				}
			} else {
				$controllerNode = $controllerNode[0];
			}

			//clean the methods. to remove those in Controller and private actions.
			foreach ($methods as $k => $method) {
				if (strpos($method, '_', 0) === 0) {
					unset($methods[$k]);
					continue;
				}
				if (in_array($method, $baseMethods)) {
					unset($methods[$k]);
					continue;
				}
				$methodNode = $aco->node('controllers/'.$ctrlName.'/'.$method);
				if (!$methodNode) {
					$aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $method));
					$methodNode = $aco->save();
					$log[] = 'Created Aco node for '. $method;
				}
			}
		}
		if(count($log)>0) {
			debug($log);
		}
	}

	function _getClassMethods($ctrlName = null) {
		App::import('Controller', $ctrlName);
		if (strlen(strstr($ctrlName, '.')) > 0) {
			// plugin's controller
			$num = strpos($ctrlName, '.');
			$ctrlName = substr($ctrlName, $num+1);
		}
		$ctrlclass = $ctrlName . 'Controller';
		$methods = get_class_methods($ctrlclass);

		// Add scaffold defaults if scaffolds are being used
		$properties = get_class_vars($ctrlclass);
		if (array_key_exists('scaffold',$properties)) {
			if($properties['scaffold'] == 'admin') {
				$methods = array_merge($methods, array('admin_add', 'admin_edit', 'admin_index', 'admin_view', 'admin_delete'));
			} else {
				$methods = array_merge($methods, array('add', 'edit', 'index', 'view', 'delete'));
			}
		}
		return $methods;
	}

	function _isPlugin($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) > 1) {
			return true;
		} else {
			return false;
		}
	}

	function _getPluginControllerPath($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[0] . '.' . $arr[1];
		} else {
			return $arr[0];
		}
	}

	function _getPluginName($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[0];
		} else {
			return false;
		}
	}

	function _getPluginControllerName($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[1];
		} else {
			return false;
		}
	}

	/**
	 * Get the names of the plugin controllers ...
	 * 
	 * This function will get an array of the plugin controller names, and
	 * also makes sure the controllers are available for us to get the 
	 * method names by doing an App::import for each plugin controller.
	 *
	 * @return array of plugin names.
	 *
	 */
	function _getPluginControllerNames() {
		App::import('Core', 'File', 'Folder');
		$paths = Configure::getInstance();
		$folder =& new Folder();
		$folder->cd(APP . 'plugins');

		// Get the list of plugins
		$Plugins = $folder->read();
		$Plugins = $Plugins[0];
		$arr = array();

		// Loop through the plugins
		foreach($Plugins as $pluginName) {
			// Change directory to the plugin
			$didCD = $folder->cd(APP . 'plugins'. DS . $pluginName . DS . 'controllers');
			// Get a list of the files that have a file name that ends
			// with controller.php
			$files = $folder->findRecursive('.*_controller\.php');

			// Loop through the controllers we found in the plugins directory
			foreach($files as $fileName) {
				// Get the base file name
				$file = basename($fileName);

				// Get the controller name
				$file = Inflector::camelize(substr($file, 0, strlen($file)-strlen('_controller.php')));
				if (!preg_match('/^'. Inflector::humanize($pluginName). 'App/', $file)) {
					if (!App::import('Controller', $pluginName.'.'.$file)) {
						debug('Error importing '.$file.' for plugin '.$pluginName);
					} else {
						/// Now prepend the Plugin name ...
						// This is required to allow us to fetch the method names.
						$arr[] = Inflector::humanize($pluginName) . "/" . $file;
					}
				}
			}
		}
		return $arr;
	}    

}
?>