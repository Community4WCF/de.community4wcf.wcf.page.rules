<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * Shows the rules page before registration.
 * 
 * @svn			$Id: RegisterRulesPage.class.php 1621 2010-08-31 14:38:33Z TobiasH87 $
 * @package		de.community4wcf.wcf.page.rules
 */
 
class RegisterRulesPage extends AbstractPage {
	public $templateName = 'registerrulesPage';

	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
		'rules' => MessageParser::getInstance()->parse(RULES_TEXT, RULES_ENABLE_SMILEY, RULES_ENABLE_HTML, RULES_ENABLE_BBCODES),
		'allowSpidersToIndexThisPage' => 0));
		
		if (RULES_BOX_ENABLE_REGISTER) {
			// parse
			WCF::getTPL()->assign(array('rulesbox' => MessageParser::getInstance()->parse(RULES_BOX_TEXT, RULES_BOX_ENABLE_SMILEY, RULES_BOX_ENABLE_HTML, RULES_BOX_ENABLE_BBCODES)));
			// show
			WCF::getTPL()->append('additionalRules', WCF::getTPL()->fetch('rulesPageBox'));
		}
	}
	
	/**
	 * @see Page::show()
	 */
	public function show() {	
		// check permission
		WCF::getUser()->checkPermission('user.managepages.canViewRules');

		// check module options
		if (!MODULE_RULES) {
			throw new IllegalLinkException();
		}

		parent::show();
	}	
}
?>