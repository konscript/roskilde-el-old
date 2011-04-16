<?php

// Usage:
// Outputs the default edit button for the current item. Automatically gets the id of the current item (as 3 in /projects/view/3)
// 	$this->Output->edit();
// Outputs add button with custom text, external controller/action and query string.
// 	$this->Output->add(
//		'Opret ny Enhed', array('controller' => 'project_items', 'action' => 'add', '?' => array('project_id' => $project['Project']['id'])));

// Definition:
// $url: array of the url as with regular Html Link Helper. Defaults to current controllers action
// $id: item id to perform the action on. Tries to find it automatically if not supplied
// $style: null defaults to standard button, 'icon' is the icon only and


class OutputHelper extends AppHelper {

    var $helpers = array('Html', 'Paginator', 'Output', 'Form');
	
	function __construct() {
		App::import('Component', 'Acl');
		$this->Acl = new AclComponent();
	}
	
	// get current user
	function _getUser() {
		return ClassRegistry::getObject('view')->viewVars['currentuser'];
	}
	
	// set id of current item
	function _setId($id) {
    	if ($id == null) {
    		if (isset($this->params['pass'][0])) {
				$id = $this->params['pass'][0];
			} else { return false; }
		}
		return $id;
	}
	
	function _getController($url) {
		if ($url == null) {
    		return Inflector::camelize($this->params['controller']);
    	} else {
    		return Inflector::camelize($url['controller']);
    	}	
	}
	
	function index($header, $data, $paginate = true, $auto = true, $associated = '') {		
				
		if (!empty($data)) {

			$out = '<table cellpadding="0" cellspacing="0">';
			
			// table header
			$out .= '<tr>';	
			foreach($header as $key => $val) {
				if($key == 'actions') {
					$out .= '<th class="actions">'.$val.'</th>';
				} else {
					$out .= '<th>';
					if ($paginate) {
						$out .= $this->Paginator->sort($val, $key);
					} else {
						$out .= $val;
					} 
					$out .= '</th>';			
				}
			}
			$out .= '</tr>';
			
			// table content
			$i = 0;
			foreach($data as $val) {
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
				$out .= '<tr'.$class.'>';	
								
				if (is_array(current($val))) {
					$values = current($val);
				} else {
					$values = $val;
				}
				
				// if auto is on
				if ($auto) {
					if (!empty($associated)){
						$associated = Inflector::tableize($associated);
					}
					foreach($header as $column => $na) {
						if (array_key_exists($column, $values)) {
							$out .= '<td>';
							if ($column == 'title') {
								if (!empty($associated)) {
									$out .= $this->Html->link($values['title'], array('controller' => $associated, 'action' => 'view', $values['id']));
								} else {
									$out .= $this->Html->link($values['title'], array('action' => 'view', $values['id']));
								}
							} else if (strpos($column, '_id') && !empty($values[$column])) {
								$name = substr($column, 0, strpos($column, '_id'));
								$camelized = Inflector::camelize($name);
								$tableized = Inflector::tableize($name);
								
								if ($name == 'user') {
									$field = 'username';
								} else {
									$field = 'title';
								}
								
								if (isset($val[$camelized]) && is_array($val[$camelized])) {
									$out .= $this->Html->link($val[$camelized]['title'], array('controller' => $tableized, 'action' => 'view', $val[$camelized]['id']));
								} else if (isset($values[$camelized]) && is_array($values[$camelized])) {
									$out .= $this->Html->link($values[$camelized]['title'], array('controller' => $tableized, 'action' => 'view', $values[$camelized]['id']));
								} else {
									$out .= $values[$column];
								}								
							} else {
								$out .= $values[$column];
							}
							$out .= '</td>';
						}
					}

					$out .= '<td class="actions">';
					if (!empty($associated)) {
						$out .= 
							$this->Output->edit(null, array('controller' => $associated, 'action' => 'edit', $values['id'])).
							$this->Output->delete(null, array('controller' => $associated, 'action' => 'edit', $values['id']));
					} else {
						$out .= $this->Output->edit(null, null, $values['id']).$this->Output->delete(null, null, $values['id']);
					}					
					$out .= '</td>';	
					
				// if data is manually supplied				
				} else {				
					foreach(current($val) as $key => $val) {
						if($key == 'actions') {
							$out .= '<td class="actions">';				
						} else {
							$out .= '<td>';			
						}
						$out .= $val;
						$out .= '</td>';				
					} 
				}
				$out .= '</tr>';
			}					
			$out .= '</table>';

			// paginator meta info			
			if ($paginate) {
				$out .= 
					'<div class="paging">';
				if ($this->Paginator->numbers()) {	
					$out .= 
						'<span class="paging_pages">'.
						$this->Paginator->prev('< ', array(), null, array('class'=>'disabled')).
						$this->Paginator->numbers().
						$this->Paginator->next(' >', array(), null, array('class' => 'disabled')).
						'</span>';
				}
				$out .= 				
					'<span class="paging_meta">'.
					$this->Paginator->counter(array('format' => 'Side %page% af %pages%, viser %current% elementer ud af i alt %count%', true)).
					'</span></div>';						
			}
				
		} else {
			$out = 'Der er ingen elementer at vise!';
		}

		// return full table output	
		return $out;		
	}
	
    function add($title = null, $url = null, $style = null) {

	    // get current user and get controller
	    $currentuser = $this->_getUser();
    	$controller = $this->_getController($url);
    	
    	// check access to the action
    	// $access = $this->Acl->check(array('model' => 'User', 'foreign_key' => $currentuser['id']), 'Application/Controllers/'.$controller.'/add');
    	$access = true;
    	
    	if ($access) {
    	    	
	    	// decide title to display in link
	    	if ($title == null) {
				$title = 'Opret';
	    	}
	    	$title = $this->Html->image('icons/10/103.png', array('alt' => 'Opret')).$title;
	    	    	
	    	// decide controller to use in taget url
	    	if ($url == null) {
	    		$url = array('action' => 'add');
	    	}
	    	
	    	// decide style for css class
	    	if ($style == null) {
	    		$style = array('class' => 'action_new', 'escape' => false);
	    	} else if ($style == 'icon') {
	    		$style = array('class' => '', 'escape' => false);
	    	}
	    	
			// build the output
			return $this->Html->link($title, $url, $style);
		}
    }

    function edit($title = null, $url = null, $id = null , $style = null) {
	    
	    // get current user, set id of targeted item and get controller
	    $currentuser = $this->_getUser();
    	$id = $this->_setId($id);
    	$controller = $this->_getController($url);
    	    	    	    	
    	// check access to the action
    	// $access = $this->Acl->check(array('model' => 'User', 'foreign_key' => $currentuser['id']), 'Application/Controllers/'.$controller.'/edit');
    	$access = true;    	
    	
    	if ($id != false && $access == true) {
	    	
	    	// decide title to display in link
	    	if ($title == null) {
	    		$title = 'Rediger';
	    	}
	    	$title = $this->Html->image('icons/10/018.png', array('alt' => 'Opret')).$title;    	
	    	
	    	// decide controller to use in taget url
	    	if ($url == null) {
	    		$url = array('action' => 'edit', $id);
	    	}
	    	
	    	// decide style for css class
	    	if ($style == null) {
	    		$style = array('class' => 'action_edit', 'escape' => false);
	    	} else if ($style == 'icon') {
	    		$style = array('class' => '');
	    	}
	
			// build the output
			return $this->Html->link($title, $url, $style);
		}
    }

    function delete($title = null, $url = null, $id = null, $style = null) {
    	
	    // get current user, set id of targeted item and get controller
	    $currentuser = $this->_getUser();
    	$id = $this->_setId($id);
    	$controller = $this->_getController($url);
    	
    	// check access to the action
    	// $access = $this->Acl->check(array('model' => 'User', 'foreign_key' => $currentuser['id']), 'Application/Controllers/'.$controller.'/delete');
    	$access = true;
    	
    	if ($id != false && $access == true) {

	    	// decide title to display in link
	    	if ($title == null) {
	    		$title = 'Slet';
	    	}
	    	$title = $this->Html->image('icons/10/101.png', array('alt' => 'Opret')).$title;
	    	
	    	// decide controller to use in taget url
	    	if ($url == null) {
	    		$url = array('action' => 'delete', $id);
	    	}
	    	
	    	// decide style for css class
	    	if ($style == null) {
	    		$style = array('class' => 'action_delete', 'escape' => false);
	    	} else if ($style == 'icon') {
	    		$style = array('class' => '');
	    	}
	
			// build the output
			return $this->Html->link($title, $url, $style, sprintf(__('Er du sikker på du vil slette #%s?', true), $id));
		}
    }
    
    function export($title = null, $url = null, $id = null , $style = null) {

	    // get current user, set id of targeted item and get controller
	    $currentuser = $this->_getUser();
    	$id = $this->_setId($id);
    	$controller = $this->_getController($url);
    	
    	// check access to the action
    	$access = true;
    	
    	if ($id != false && $access == true) {
	    	
	    	// decide title to display in link
	    	if ($title == null) {
	    		$title = 'Eksport til Excel';
	    	}
	    	$title = $this->Html->image('icons/10/139.png', array('alt' => 'Opret')).$title;
	    	
	    	
	    	// decide controller to use in taget url
	    	if ($url == null) {
	    		$url = array('action' => 'createExcel', $id);
	    	}
	    	
	    	// decide style for css class
	    	if ($style == null) {
	    		$style = array('class' => 'action_export', 'escape' => false);
	    	} else if ($style == 'icon') {
	    		$style = array('class' => '');
	    	}
	
			// build the output
			return $this->Html->link($title, $url, $style);
		}
    }    

    function icon($icon = null, $size = null) {    	
    	$out = '';
		
		// set size of the icon
		if ($size == 'large') {
			$size = '16';
		} else if ($size == 'small') {
			$size = '10';
		} else {
			$size = '16'; // large is default
		}
		
		// check if icon name is predefined
    	if ($icon == 'user') {
    		$src = 'icons/'.$size.'/006.png';
    		$out = $this->Html->image($src, array('class' => 'icon_user', 'escape' => false));
    	} else if ($icon == 'group') {
    		$src = 'icons/'.$size.'/045.png';    	
    		$out = $this->Html->image($src, array('class' => 'icon_group', 'escape' => false));
    	}
    	// if icon supplied is not recognized
    	else {
    		$src = 'icons/'.$size.'/'.$icon.'.png';
    		$class = 'icon_'.$icon;
    		$out = $this->Html->image($src, array('class' => $class, 'escape' => false));    	
    	}
    	
		// build the output
		return $out;
    }    


    function status($title = false, $statusid = null) {    	
    	$imagealt = "Status: ".$statusid;
    	$out = '';
    	
    	// decide style for css class
    	$style = 'meta_status';
    		    	
    	// decide icon - neutral
    	if ($statusid == 0) {
    		$out = $this->Html->image('icons/16/159.png', array('alt' => $imagealt, 'class' => $style, 'escape' => false));
    		if ($title) {
    			$out .= "Igangværende";
    		}
    	}
    	// decide icon - accepted
    	else if ($statusid == 1) {
    		$out = $this->Html->image('icons/16/152.png', array('alt' => $imagealt, 'class' => $style, 'escape' => false));
    		if ($title) {
    			$out .= "Godkendt";
    		}
    		
    	}
    	// decide icon - rejected
    	else if ($statusid == 2) {
    		$out = $this->Html->image('icons/16/151.png', array('alt' => $imagealt, 'class' => $style, 'escape' => false));
    		if ($title) {
    			$out .= "Afvist";
    		}
    	}
    	
		// build the output
		return $out;
    }    

    function powerUsage($usage = 0, $allowance = 0) {

		$status = "";
		if ($allowance == 0) {
			$status = "0";			 	
		} else if ($usage < $allowance) {
			$status = "1";
		} else if ($usage > $allowance) {
			$status = "2"; 
		}    	
    	
		$out = "<span class='icon_powerusage_".$status."'>".$usage."</span>";
    	    	
		// build the output
		return $out;
    }    
    
    
    function project_list($project_field, $projects){    
    
        //add item to specific project
        if(count($projects)==1){
        
			//If creating a new item, add the project_id to project model. Else just add relation to ItemsProject model    					                         
	        $project_id = $this->params["pass"][0];
	        $assigned_to_project_string = "Tilknyttet til  ".$this->Html->link($projects[$project_id], array("controller"=>"projects", "action"=>"view", $project_id));						    
	        $project_value = array('type'=>'hidden', 'value'=>$project_id);			                    	
        	
	        return $assigned_to_project_string.$this->Form->input($project_field, $project_value);                        
            

        //show a list with all projects
        }else{        
    		echo $this->Form->input('ItemsProject.project_id', array('empty' => true, 'label'=>'Projekt', 'class'=>'showOnChange'));        
        }


    }     


}

?>
