<?php

class UtilsComponent extends Object {

	var $components = array('SpecificAcl', 'Email');

	// Method for creating random passwords (not used directly as an action)
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

	// Method for creating projects (not used directly as an action)
	// Returns true/false if successful/failed
	function createProject($object, $data){
	    // check if the project was saved - if it was: do the ACL thing!
	    if ($object->save($data["Project"])) {
	
            // workaround to pass project id
            $data['Project']['id'] = $object->id;

            // SPECIFICACL: Reassigns permission for the chosen project manager
            $this->SpecificAcl->allow("Project", $data);

            return true;
	    } else { return false; }
	}
	
}
?>
