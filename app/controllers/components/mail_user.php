<?php

class MailUserComponent extends Object {

	var $components = array('Email');

	function sendMail($name, $username, $password, $role) {
		$this->Email->from    = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
		$this->Email->replyTo = 'Roskilde Festival <nicolai.johansen@roskilde-festival.dk>';
		$this->Email->to      = $username;
		$this->Email->subject = 'Roskilde Festival: Oprettet som '.$role.' i el-system';
		$this->Email->send("Det virker!");
		return true;
/*		if($this->Email->send(
			"Hej ".$name.",<br /><br />
			Du er nu blevet oprettet som ".$role." i Underholdningssektionens el-system, som du finder her: http://el.laander.com <br /><br />
			Dit brugernavn er: ".$username."<br />
			Din adgangskode er: ".$password." <br /><br/>
			De bedste hilsener, <br /><br />
			Produktionsgruppen <br />
			Underholdningssektionen <br />
			Roskilde Festival <br />"
			)) {
			return true;
		} else { return false; } */
	}	

}
?>
