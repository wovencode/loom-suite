<?php

// =======================================================================================
// LOOM SUITE : LOOM SERVER (Copyright by wovencode.net)
//
//   --- DO NOT CHANGE ANYTHING BELOW THIS LINE (UNLESS YOU KNOW WHAT YOU ARE DOING) ---
// =======================================================================================

class ls_ActionRequestPassword extends ls_BaseAction {

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
		
		if (isset($_GET['n']) && isset($_GET['e']) && isset($_GET['c'])) {
			if (!MUtil::empty($_GET['n'], $_GET['e'], $_GET['c'])) {
			
				$_GET['e'] = MUtil::sanitizeString($_GET['e']);
				$_GET['n'] = MUtil::sanitizeString($_GET['n']);
				$_GET['c'] = MUtil::sanitizeString($_GET['c']);
				
				if (MUtil::validateName($_GET['n']) &&
					MUtil::validateEmail($_GET['e']) &&
					MUtil::validateCode($_GET['c'])
					) {
		
						$success = $this->core->call('ModuleAccount', 'resetPassword');
		
						if ($success)
							echo "Your password has been reset, please check your inbox.";

					}
			}
		}
		
		die();
	}
	
	// -----------------------------------------------------------------------------------

}

//=====================================================================================EOF