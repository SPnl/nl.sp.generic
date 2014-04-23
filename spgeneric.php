<?php

require_once 'spgeneric.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function spgeneric_civicrm_config(&$config) {
  _spgeneric_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function spgeneric_civicrm_xmlMenu(&$files) {
  _spgeneric_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function spgeneric_civicrm_install() {
  return _spgeneric_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function spgeneric_civicrm_uninstall() {
  return _spgeneric_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function spgeneric_civicrm_enable() {
  
  _spgeneric_location_type('Bezoekadres', 1);
  _spgeneric_static_group_value('Postvak', 1, 1);
  _spgeneric_static_group_value('Aan bestand toegevoegd', 2, 1);
  _spgeneric_static_group_value('Cursus', 14, 1);
  _spgeneric_membership_type("Lid SP", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1);   
  _spgeneric_membership_type("Lid SP en ROOD", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1);   
  _spgeneric_membership_type("Lid ROOD", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1); 
  _spgeneric_membership_type("Abonnee Tribune Betaald", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1);  
  _spgeneric_membership_type("Abonnee Tribune Proef", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1);  
  _spgeneric_membership_type("Abonnee Tribune Gratis", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1); 
  _spgeneric_membership_type("Abonnee SPanning", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1);  
  _spgeneric_membership_type("Abonnee SPeciaal", array(
		'domain_id' => 1,
		'member_of_contact_id' => 1,
		'financial_type_id' => 2,
		'duration_unit' => 'lifetime',
		'duration_interval' => 1,
		'is_active' => 1,
		'version' => 3
	)
  , 1);
  return _spgeneric_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function spgeneric_civicrm_disable() {
  
  _spgeneric_location_type('Bezoekadres', 0);
  _spgeneric_static_group_value('Postvak', 1, 0);
  _spgeneric_static_group_value('Aan bestand toegevoegd', 2, 0);
  _spgeneric_static_group_value('Cursus', 14, 0);
  _spgeneric_membership_type("Lid SP", array(), 0);
  _spgeneric_membership_type("Lid ROOD", array(), 0);
  _spgeneric_membership_type("Lid SP en ROOD", array(), 0);
  _spgeneric_membership_type("Abonnee Tribune Betaald", array(), 0);
  _spgeneric_membership_type("Abonnee Tribune Proef", array(), 0);
  _spgeneric_membership_type("Abonnee Tribune Gratis", array(), 0);
  _spgeneric_membership_type("Abonnee SPanning", array(), 0);
  _spgeneric_membership_type("Abonnee SPeciaal", array(), 0);
  return _spgeneric_civix_civicrm_disable();
}

function _spgeneric_location_type($name, $enabled) {
	
	$ltExists = civicrm_api('LocationType', 'getsingle', array('version' => 3, 'name' => $name));
	
	if(!isset($ltExists['id']) && $enabled) {
		$result = civicrm_api('LocationType', 'create', array('version' => 3, 'name' => $name, 'display_name' => $name, 'is_active' => $enabled));
	} else if(isset($ltExists['id'])) {
		$result = civicrm_api('LocationType', 'create', array('version' => 3, 'id' => $ltExists['id'], 'is_active' => $enabled));
	}
	
}

function _spgeneric_static_group_value($label, $ogIdentifier, $enabled) {
	
	$ogvExists = civicrm_api('OptionValue', 'getsingle', array('version' => 3, 'label' => $label, 'option_group_id' => $ogIdentifier));
	
	if(!isset($ogvExists['id']) && $enabled) {
		$result = civicrm_api('OptionValue', 'create', array('version' => 3, 'label' => $label, 'option_group_id' => $ogIdentifier, 'is_active' => $enabled));
	} else if(isset($ogvExists['id'])) {
		$result = civicrm_api('OptionValue', 'create', array('version' => 3, 'id' => $ogvExists['id'], 'is_active' => $enabled));
	}
	
}

function _spgeneric_membership_type($name, $arguments, $enabled) {
	
	$mbtExists = civicrm_api('MembershipType', 'getsingle', array("name" => $name, 'version' => 3));
	if(!isset($mbtExists['id']) && $enabled) {
		$arguments['name'] = $name;
		$result = civicrm_api('MembershipType', 'create', $arguments);
	} else {
		$mbtExists['is_active'] = $enabled;
		$mbtExists['version'] = 3;
		$result = civicrm_api('MembershipType', 'create', $mbtExists);
	}	

}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function spgeneric_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _spgeneric_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function spgeneric_civicrm_managed(&$entities) {
  return _spgeneric_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function spgeneric_civicrm_caseTypes(&$caseTypes) {
  _spgeneric_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function spgeneric_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _spgeneric_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
