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

    var $helpers = array('Html');
	
	function _setId($id) {
    	if ($id == null) {
    		if (isset($this->params['pass'][0])) {
				$id = $this->params['pass'][0];
			} else { return false; }
		}
		return $id;
	}
	
    function add($title = null, $url = null, $style = null) {
    	
    	// decide title to display in link
    	if ($title == null) {
    		$title = 'Opret';
    	}
    	
    	// decide controller to use in taget url
    	if ($url == null) {
    		$url = array('action' => 'add');
    	}
    	
    	// decide style for css class
    	if ($style == null) {
    		$style = array('class' => 'action_button action_new');
    	} else if ($style == 'icon') {
    		$style = array('class' => '');
    	}
    	
		// build the output
		echo $this->output($this->Html->link($title, $url, $style));
    }

    function edit($title = null, $url = null, $id = null , $style = null) {
    	
    	// set id of targeted item
    	$id = $this->_setId($id);
    	if ($id != false) {
	    	
	    	// decide title to display in link
	    	if ($title == null) {
	    		$title = 'Rediger';
	    	}
	    	
	    	// decide controller to use in taget url
	    	if ($url == null) {
	    		$url = array('action' => 'edit', $id);
	    	}
	    	
	    	// decide style for css class
	    	if ($style == null) {
	    		$style = array('class' => 'action_button action_edit');
	    	} else if ($style == 'icon') {
	    		$style = array('class' => '');
	    	}
	
			// build the output
			echo $this->output($this->Html->link($title, $url, $style));
		}
    }

    function delete($title = null, $url = null, $id = null, $style = null) {
    	
    	// set id of targeted item
    	$id = $this->_setId($id);    	
    	if ($id != false) {

	    	// decide title to display in link
	    	if ($title == null) {
	    		$title = 'Slet';
	    	}
	    	
	    	// decide controller to use in taget url
	    	if ($url == null) {
	    		$url = array('action' => 'delete', $id);
	    	}
	    	
	    	// decide style for css class
	    	if ($style == null) {
	    		$style = array('class' => 'action_button action_delete');
	    	} else if ($style == 'icon') {
	    		$style = array('class' => '');
	    	}
	
			// build the output
			echo $this->output($this->Html->link($title, $url, $style, sprintf(__('Er du sikker på du vil slette #%s?', true), $id)));
		}
    }
    
    function export($title = null, $url = null, $id = null , $style = null) {
    	
    	// set id of targeted item
    	$id = $this->_setId($id);
    	if ($id != false) {
	    	
	    	// decide title to display in link
	    	if ($title == null) {
	    		$title = 'Eksport til Excel';
	    	}
	    	
	    	// decide controller to use in taget url
	    	if ($url == null) {
	    		$url = array('action' => 'createExcel', $id);
	    	}
	    	
	    	// decide style for css class
	    	if ($style == null) {
	    		$style = array('class' => 'action_button action_export');
	    	} else if ($style == 'icon') {
	    		$style = array('class' => '');
	    	}
	
			// build the output
			echo $this->output($this->Html->link($title, $url, $style));
		}
    }    

}

?>
