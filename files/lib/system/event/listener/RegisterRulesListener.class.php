<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * Shows the rules before registration.
 * 
 * @svn			$Id: RegisterRulesListener.class.php 1594 2010-08-28 12:45:57Z TobiasH87 $
 * @package		de.community4wcf.wcf.page.rules
 */

class RegisterRulesListener implements EventListener {
	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if (MODULE_RULES && RULES_ENABLE_REGISTER && WCF::getUser()->getPermission('user.managepages.canViewRules')) {
			// Overwrite the last lines of the RegisterPage.class
			switch ($eventObj->action) {
				case '':
					if (MODULE_RULES && RULES_ENABLE_REGISTER && WCF::getUser()->getPermission('user.managepages.canViewRules')) {
						require_once(WCF_DIR.'lib/page/RegisterRulesPage.class.php');
						new RegisterRulesPage();
						break;
					}
				default:
					require_once(WCF_DIR.'lib/form/RegisterForm.class.php');
					new RegisterForm();
			}
			exit;
		}
	}
}
?>