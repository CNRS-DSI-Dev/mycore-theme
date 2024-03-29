<?php

/* Theming the name and slogan of your ownCloud installation is as easy
as copying this content to a brandnew
/themes/[replace-by-your-theme-name]/defaults.php
and replacing the strings in __construct() with your best name ideas */

class OC_Theme {

	private $myEntity;
	private $myName;
	private $myTitle;
	private $myBaseUrl;
	private $mySlogan;
	private $myLogoClaim;
	private $mySyncClientUrl;
	private $myDocBaseUrl;

	function __construct() {

		// basics
		$this->myEntity = "CNRS"; /* e.g. company name, used for footers and copyright notices */
		$this->myName = "Service My CoRe"; /* short name, used when referring to the service */
		$this->myTitle = "My CoRe"; /* can be a longer name, for titles */
		$this->myBaseUrl = "https://confluence.cnrs.fr/confluence/display/ODSCORE/Aide+utilisateur";
		$this->mySlogan = "My CoRe, partage et nomadisme";
		$this->myLogoClaim = "";
		$this->myDocBaseUrl = "https://confluence.cnrs.fr/confluence/display/ODSCORE/Aide+utilisateur";

		// for perfectionists (others: just keep it like this)
		$this->defaultSyncClientUrl = " http://owncloud.org/sync-clients/";
		$this->defaultDocBaseUrl = "https://confluence.cnrs.fr/confluence/display/ODSCORE/Aide+utilisateur";

	}

	public function getBaseUrl() {
		return $this->myBaseUrl;
	}

	public function getSyncClientUrl() {
		return $this->mySyncClientUrl;
	}

	public function getDocBaseUrl() {
		return $this->myDocBaseUrl;
	}

	public function getTitle() {
		return $this->myTitle;
	}

	public function getName() {
		return $this->myName;
	}

	public function getEntity() {
		return $this->myEntity;
	}

	public function getSlogan() {
		return $this->mySlogan;
	}

	public function getLogoClaim() {
		return $this->myLogoClaim;
	}

	public function getHelpUrl() {
		return \OCP\Config::getSystemvalue('help_url', '');
	}

	public function getShortFooter() {
		$baseUrl = "<a href=\"". $this->getBaseUrl() . "\" target=\"_blank\">" . $this->getEntity() . "</a>" ;
		$slogan = $this->getSlogan();

		// === GTU

		$cguUrl = '';
		if(OC_APP::isEnabled('gtu')) {
			$cguUrl = \OCP\Config::getAppvalue('gtu', 'url', '');
		}
		if (empty($cguUrl)) {
			$cguUrl = \OCP\Config::getSystemvalue('custom_termsofserviceurl', '');
		}

		$cgu = '';
		if (!empty($cguUrl)) {
			$cgu = '<a href="' . $cguUrl . '" target="_blank">CGU</a>';
		}

		// === Help
		$helpUrl = '';
		if (empty($helpUrl)) {
			$helpUrl = $this->getHelpUrl();
		}

		$help = '';
		if (!empty($helpUrl)) {
			$help = '<a href="' . $helpUrl . '" target="_blank">Aide</a>';
		}

		// === contact
		$contact = ' – '  . '<a href="http://ods.cnrs.fr/contacts.html" target="_blank">Contacts</a>';

		// =========================
		$footer = $baseUrl . ' – '  .  $slogan . ' – '  . $cgu . ' – '  . $help . $contact;
		return $footer;
	}

	public function getLongFooter() {
		// === Local connection
		$localConnect = ' – '  . '<a href="#" id="localConnect">Connexion locale</a>';

		$footer = $this->getShortFooter() . $localConnect;
		return $footer;
	}

}
