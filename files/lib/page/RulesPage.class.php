<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * Shows rules page.
 * 
 * @svn			$Id: RulesPage.class.php 1621 2010-08-31 14:38:33Z TobiasH87 $
 * @package		de.community4wcf.wcf.page.rules
 */

class RulesPage extends AbstractPage {
	public $templateName = 'rulesPage';

	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
		'rules' => MessageParser::getInstance()->parse(RULES_TEXT, RULES_ENABLE_SMILEY, RULES_ENABLE_HTML, RULES_ENABLE_BBCODES),
		'allowSpidersToIndexThisPage' => ALLOW_SPIDER_ON_RULES));
	
		if (RULES_BOX_ENABLE) {
			// parse
			WCF::getTPL()->assign(array('rulesbox' => MessageParser::getInstance()->parse(RULES_BOX_TEXT, RULES_BOX_ENABLE_SMILEY, RULES_BOX_ENABLE_HTML, RULES_BOX_ENABLE_BBCODES)));
			// show
			if (RULES_BOX_POSITION == 'top' || RULES_BOX_POSITION == 'bottom') {
				WCF::getTPL()->append((RULES_BOX_POSITION == 'top' ? 'additionalTopRules' : 'additionalBottomRules'), WCF::getTPL()->fetch('rulesPageBox'));
			}
			if (RULES_BOX_POSITION == 'rules') {
				WCF::getTPL()->append('additionalRules', WCF::getTPL()->fetch('rulesPageBox'));
			}
		}
	}

	/**
	 * @see Page::show()
	 */
	public function show() {
		// set active menu item
		require_once(WCF_DIR.'lib/page/util/menu/PageMenu.class.php');
		PageMenu::setActiveMenuItem('wcf.header.menu.rules');
		
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