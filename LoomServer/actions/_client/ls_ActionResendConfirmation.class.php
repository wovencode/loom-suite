<?php

// =======================================================================================
// LOOM SUITE : LOOM SERVER (Copyright by wovencode.net)
//
//   --- DO NOT CHANGE ANYTHING BELOW THIS LINE (UNLESS YOU KNOW WHAT YOU ARE DOING) ---
// =======================================================================================

class ls_ActionResendConfirmation extends ls_BaseAction {
	
	//------------------------------------------------------------------------------------
	// construct
	//------------------------------------------------------------------------------------
	public function __construct(ls_Core&$core) {
		parent::__construct($core, 'visitor');
	}
	
	//------------------------------------------------------------------------------------
	// performAction
	//------------------------------------------------------------------------------------
	protected function performAction() {
		
		$success = false;
		
		$username 	= MUtil::getPOST(CONF_VAR_STRING,1);
		$email 		= MUtil::getPOST(CONF_VAR_STRING,2);
		
		if (
			CONST_ACCOUNT_CONFIRMATION &&
			( MUtil::validateName($username) ||
			MUtil::validateEmail($email) )
			) {		
		
				$success = $this->core->call('ModuleAccount', 'resendRegistrationConfirmation', $username, $email);
		
		}
		
		parent::addDefaultResult($success);
		
	}
	
	// -----------------------------------------------------------------------------------

}

//=====================================================================================EOF