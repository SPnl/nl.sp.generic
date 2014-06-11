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
  _spgeneric_static_group_value('Documenthistorie', 2, 1);
  _spgeneric_static_group_value('Cursus', 14, 1);
  _spgeneric_contact_type("SP-Gemeente", "Gemeente van de SP", 1);
  _spgeneric_contact_type("SP-Afdeling", "Afdeling van de SP", 1);
  _spgeneric_contact_type("SP-Regio", "Regio van de SP", 1);
  _spgeneric_contact_type("SP-Provincie", "Provincie van de SP", 1);
  _spgeneric_contact_type("SP-Landelijk", "Landelijk van de SP", 1);
  _spgeneric_contact_type("SP-Fractie", "Fractie van de SP", 1);
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
  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_gem_afdeling',
		'name_b_a' => 'sprel_afdeling_gem',
		'label_a_b' => 'is gemeente van',
		'label_b_a' => 'heeft gemeente',
		'contact_type_a' => 'organization',
		'contact_type_b' => 'organization',
		'contact_sub_type_a' => 'SP_Gemeente',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen SP-Afdeling en SP-Gemeente',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_afdeling_regio',
		'name_b_a' => 'sprel_regio_afdeling',
		'label_a_b' => 'is afdeling van',
		'label_b_a' => 'heeft afdeling',
		'contact_type_a' => 'organization',
		'contact_type_b' => 'organization',
		'contact_sub_type_a' => 'SP_Afdeling',
		'contact_sub_type_b' => 'SP_Regio',
		'description' => 'Relatie tussen SP-Regio en SP-Afdeling',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_regio_provincie',
		'name_b_a' => 'sprel_provincie_regio',
		'label_a_b' => 'is regio van',
		'label_b_a' => 'heeft regio',
		'contact_type_a' => 'organization',
		'contact_type_b' => 'organization',
		'contact_sub_type_a' => 'SP_Regio',
		'contact_sub_type_b' => 'SP_Provincie',
		'description' => 'Relatie tussen SP-Provincie en SP-Regio',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_voorzitter_afdeling',
		'name_b_a' => 'sprel_afdeling_voorzitter',
		'label_a_b' => 'is voorzitter van',
		'label_b_a' => 'heeft als voorzitter',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen voorzitter en SP-Afdeling',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_vervangendvoorzitter_afdeling',
		'name_b_a' => 'sprel_afdeling_vervangendvoorzitter',
		'label_a_b' => 'is vervangend voorzitter van',
		'label_b_a' => 'heeft als vervangend voorzitter',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen vervangend voorzitter en SP-Afdeling',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_organisatiesecretaris_afdeling',
		'name_b_a' => 'sprel_afdeling_organisatiesecretaris',
		'label_a_b' => 'is organisatiesecretaris van',
		'label_b_a' => 'heeft als organisatiesecretaris',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen organisatiesecretaris en SP-Afdeling',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_penningmeester_afdeling',
		'name_b_a' => 'sprel_afdeling_penningmeester',
		'label_a_b' => 'is penningmeester van',
		'label_b_a' => 'heeft als penningmeester',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen penningmeester en SP-Afdeling',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_bestuurslid_afdeling',
		'name_b_a' => 'sprel_afdeling_bestuurslid',
		'label_a_b' => 'is bestuurslid van',
		'label_b_a' => 'heeft bestuurslid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen bestuurslid en SP-Afdeling',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_kaderlid_afdeling',
		'name_b_a' => 'sprel_afdeling_kaderlid',
		'label_a_b' => 'is kaderlid van',
		'label_b_a' => 'heeft kaderlid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen kaderlid en SP-Afdeling',
		'version' => 3
  ), 1); 
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_ROOD_Contactpersoon_afdeling',
		'name_b_a' => 'sprel_afdeling_ROOD_Contactpersoon',
		'label_a_b' => 'is ROOD-Contactpersoon van',
		'label_b_a' => 'heeft ROOD-Contactpersoon',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen ROOD-Contactpersoon en SP-Afdeling',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_scholingsverantwoordelijke_afdeling',
		'name_b_a' => 'sprel_afdeling_scholingsverantwoordelijke',
		'label_a_b' => 'is scholingsverantwoordelijke van',
		'label_b_a' => 'heeft scholingsverantwoordelijke',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen scholingsverantwoordelijke en SP-Afdeling',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_opnaartweehonderd_afdeling',
		'name_b_a' => 'sprel_afdeling_opnaartweehonderd',
		'label_a_b' => 'is verantwoordelijke "Op naar 200 afdelingen" van',
		'label_b_a' => 'heeft verantwoordelijke "Op naar 200 afdelingen"',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen verantwoordelijke "Op naar 200 afdelingen" en SP-Afdeling',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_webmaster_afdeling',
		'name_b_a' => 'sprel_afdeling_webmaster',
		'label_a_b' => 'is webmaster van',
		'label_b_a' => 'heeft webmaster',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen webmaster en SP-Afdeling',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_hulpdienstmedewerker_afdeling',
		'name_b_a' => 'sprel_afdeling_hulpdienstmedewerker',
		'label_a_b' => 'is hulpdienstmedewerker van',
		'label_b_a' => 'heeft hulpdienstmedewerker',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen hulpdienstmedewerker en SP-Afdeling',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_verantwoordelijke_ledenadministratie_afdeling',
		'name_b_a' => 'sprel_afdeling_verantwoordelijke_ledenadministratie',
		'label_a_b' => 'is verantwoordelijke ledenadministratie van',
		'label_b_a' => 'heeft verantwoordelijke ledenadministratie',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen verantwoordelijke ledenadministratie en SP-Afdeling',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_bestelpersoon_afdeling',
		'name_b_a' => 'sprel_afdeling_bestelpersoon',
		'label_a_b' => 'is bestelpersoon van',
		'label_b_a' => 'heeft bestelpersoon',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Afdeling',
		'description' => 'Relatie tussen bestelpersoon en SP-Afdeling',
		'version' => 3
  ), 1); 
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_bestelpersoon_fractie',
		'name_b_a' => 'sprel_fractie_bestelpersoon',
		'label_a_b' => 'is bestelpersoon van',
		'label_b_a' => 'heeft bestelpersoon',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Fractie',
		'description' => 'Relatie tussen bestelpersoon en SP-Fractie',
		'version' => 3
  ), 1); 
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_bestelpersoon_provincie',
		'name_b_a' => 'sprel_provincie_bestelpersoon',
		'label_a_b' => 'is bestelpersoon van',
		'label_b_a' => 'heeft bestelpersoon',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Provincie',
		'description' => 'Relatie tussen bestelpersoon en SP-Provincie',
		'version' => 3
  ), 1); 
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_bestelpersoon_landelijk',
		'name_b_a' => 'sprel_landelijk_bestelpersoon',
		'label_a_b' => 'is bestelpersoon van',
		'label_b_a' => 'heeft bestelpersoon',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen bestelpersoon en SP-Landelijk',
		'version' => 3
  ), 1); 
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_fractievoorzitter_fractie',
		'name_b_a' => 'sprel_fractie_fractievoorzitter',
		'label_a_b' => 'is fractievoorzitter van',
		'label_b_a' => 'heeft fractievoorzitter',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Fractie',
		'description' => 'Relatie tussen fractievoorzitter en SP-Fractie',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_fractievoorzitter_provincie',
		'name_b_a' => 'sprel_provincie_fractievoorzitter',
		'label_a_b' => 'is fractievoorzitter van',
		'label_b_a' => 'heeft fractievoorzitter',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Provincie',
		'description' => 'Relatie tussen fractievoorzitter en SP-Provincie',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_fractievoorzitter_landelijk',
		'name_b_a' => 'sprel_landelijk_fractievoorzitter',
		'label_a_b' => 'is fractievoorzitter van',
		'label_b_a' => 'heeft fractievoorzitter',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen fractievoorzitter en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_gemeenteraadslid_fractie',
		'name_b_a' => 'sprel_fractie_gemeenteraadslid',
		'label_a_b' => 'is gemeenteraadslid van',
		'label_b_a' => 'heeft gemeenteraadslid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Fractie',
		'description' => 'Relatie tussen gemeenteraadslid en SP-Fractie',
		'version' => 3
  ), 1);   
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_deelraadslid_fractie',
		'name_b_a' => 'sprel_fractie_deelraadslid',
		'label_a_b' => 'is deelraadslid van',
		'label_b_a' => 'heeft deelraadslid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Fractie',
		'description' => 'Relatie tussen deelraadslid en SP-Fractie',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_wethouder_fractie',
		'name_b_a' => 'sprel_fractie_wethouder',
		'label_a_b' => 'is wethouder van',
		'label_b_a' => 'heeft wethouder',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Fractie',
		'description' => 'Relatie tussen wethouder en SP-Fractie',
		'version' => 3
  ), 1); 
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_statenlid_provincie',
		'name_b_a' => 'sprel_provincie_statenlid',
		'label_a_b' => 'is statenlid van',
		'label_b_a' => 'heeft statenlid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Provincie',
		'description' => 'Relatie tussen statenlid en SP-Provincie',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_gedeputeerde_provincie',
		'name_b_a' => 'sprel_provincie_gedeputeerde',
		'label_a_b' => 'is gedeputeerde van',
		'label_b_a' => 'heeft gedeputeerde',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Provincie',
		'description' => 'Relatie tussen gedeputeerde en SP-Provincie',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_tweede_kamerlid_landelijk',
		'name_b_a' => 'sprel_landelijk_tweede_kamerlid',
		'label_a_b' => 'is tweede-kamerlid van',
		'label_b_a' => 'heeft tweede-kamerlid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen tweede-kamerlid en SP-Landelijk',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_eerste_kamerlid_landelijk',
		'name_b_a' => 'sprel_landelijk_eerste_kamerlid',
		'label_a_b' => 'is eerste-kamerlid van',
		'label_b_a' => 'heeft eerste-kamerlid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen eerste-kamerlid en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_europarlementarier_landelijk',
		'name_b_a' => 'sprel_landelijk_europarlementarier',
		'label_a_b' => 'is europarlementariër van',
		'label_b_a' => 'heeft europarlementariër',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen europarlementariër en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_partijbestuurslid_landelijk',
		'name_b_a' => 'sprel_landelijk_partijbestuurslid',
		'label_a_b' => 'is partijbestuurslid van',
		'label_b_a' => 'heeft partijbestuurslid',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen partijbestuurslid en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_liddagelijksbestuur_landelijk',
		'name_b_a' => 'sprel_landelijk_liddagelijksbestuur',
		'label_a_b' => 'is lid dagelijks bestuur van',
		'label_b_a' => 'heeft lid dagelijks bestuur',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen lid dagelijks bestuur en SP-Landelijk',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_regiobestuurder_landelijk',
		'name_b_a' => 'sprel_landelijk_regiobestuurder',
		'label_a_b' => 'is regiobestuurder van',
		'label_b_a' => 'heeft als regiobestuurder',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Regio',
		'description' => 'Relatie tussen regiobestuurder en SP-Regio',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_personeelslid_amersfoort_landelijk',
		'name_b_a' => 'sprel_landelijk_personeelslid_amersfoort',
		'label_a_b' => 'is personeelslid amersfoort van',
		'label_b_a' => 'heeft personeelslid amersfoort',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen personeelslid amersfoort en SP-Landelijk',
		'version' => 3
  ), 1);  
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_personeelslid_denhaag_landelijk',
		'name_b_a' => 'sprel_landelijk_personeelslid_denhaag',
		'label_a_b' => 'is personeelslid denhaag van',
		'label_b_a' => 'heeft personeelslid denhaag',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen personeelslid denhaag en SP-Landelijk',
		'version' => 3
  ), 1); 
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_personeelslid_brussel_landelijk',
		'name_b_a' => 'sprel_landelijk_personeelslid_brussel',
		'label_a_b' => 'is personeelslid brussel van',
		'label_b_a' => 'heeft personeelslid brussel',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen personeelslid brussel en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_lidberoepscomissie_landelijk',
		'name_b_a' => 'sprel_landelijk_lidberoepscomissie',
		'label_a_b' => 'is lid beroepscomissie van',
		'label_b_a' => 'heeft lid beroepscomissie',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen lid beroepscomissie en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_lidfinancielecontrolecomissie_landelijk',
		'name_b_a' => 'sprel_landelijk_lidfinancielecontrolecomissie',
		'label_a_b' => 'is lid financiële controlecomissie van',
		'label_b_a' => 'heeft lid financiële controlecomissie',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen lid financiële controlecomissie en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_lidvteam_landelijk',
		'name_b_a' => 'sprel_landelijk_lidvteam',
		'label_a_b' => 'is lid v-team van',
		'label_b_a' => 'heeft lid v-team',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen lid v-team en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_bestuurslidrood_landelijk',
		'name_b_a' => 'sprel_landelijk_bestuurslidrood',
		'label_a_b' => 'is bestuurslid ROOD van',
		'label_b_a' => 'heeft bestuurslid ROOD',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen bestuurslid ROOD en SP-Landelijk',
		'version' => 3
  ), 1);
  _spgeneric_relationship_type(array(
		'name_a_b' => 'sprel_actiefroodlandelijk_landelijk',
		'name_b_a' => 'sprel_landelijk_actiefroodlandelijk',
		'label_a_b' => 'is actief ROOD landelijk van',
		'label_b_a' => 'heeft actief ROOD landelijk',
		'contact_type_a' => 'individual',
		'contact_type_b' => 'organization',
		'contact_sub_type_b' => 'SP_Landelijk',
		'description' => 'Relatie tussen actief ROOD landelijk en SP-Landelijk',
		'version' => 3
  ), 1);
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
  _spgeneric_static_group_value('Documenthistorie', 2, 0);
  _spgeneric_static_group_value('Cursus', 14, 0);
  _spgeneric_contact_type("SP-Gemeente", "Gemeente van de SP", 0);
  _spgeneric_contact_type("SP-Afdeling", "Afdeling van de SP", 0);
  _spgeneric_contact_type("SP-Regio", "Regio van de SP", 0);
  _spgeneric_contact_type("SP-Provincie", "Provincie van de SP", 0);
  _spgeneric_contact_type("SP-Landelijk", "Landelijk van de SP", 0);
  _spgeneric_contact_type("SP-Fractie", "Fractie van de SP", 0);
  _spgeneric_membership_type("Lid SP", array(), 0);
  _spgeneric_membership_type("Lid ROOD", array(), 0);
  _spgeneric_membership_type("Lid SP en ROOD", array(), 0);
  _spgeneric_membership_type("Abonnee Tribune Betaald", array(), 0);
  _spgeneric_membership_type("Abonnee Tribune Proef", array(), 0);
  _spgeneric_membership_type("Abonnee Tribune Gratis", array(), 0);
  _spgeneric_membership_type("Abonnee SPanning", array(), 0);
  _spgeneric_membership_type("Abonnee SPeciaal", array(), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_gem_afdeling','name_b_a' => 'sprel_afdeling_gem','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_afdeling_regio','name_b_a' => 'sprel_regio_afdeling','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_regio_provincie','name_b_a' => 'sprel_provincie_regio','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_voorzitter_afdeling','name_b_a' => 'sprel_afdeling_voorzitter','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_vervangendvoorzitter_afdeling', 'name_b_a' => 'sprel_afdeling_vervangendvoorzitter', 'version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_organisatiesecretaris_afdeling','name_b_a' => 'sprel_afdeling_organisatiesecretaris','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_penningmeester_afdeling','name_b_a' => 'sprel_afdeling_penningmeester','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_bestuurslid_afdeling','name_b_a' => 'sprel_afdeling_bestuurslid','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_kamerlid_afdeling','name_b_a' => 'sprel_afdeling_kamerlid','version' => 3), 0); 
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_ROOD_Contactpersoon_afdeling','name_b_a' => 'sprel_afdeling_ROOD_Contactpersoon','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_scholingsverantwoordelijke_afdeling','name_b_a' => 'sprel_afdeling_scholingsverantwoordelijke','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_opnaartweehonderd_afdeling','name_b_a' => 'sprel_afdeling_opnaartweehonderd','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_webmaster_afdeling','name_b_a' => 'sprel_afdeling_webmaster','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_hulpdienstmedewerker_afdeling','name_b_a' => 'sprel_afdeling_hulpdienstmedewerker','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_verantwoordelijke_ledenadministratie_afdeling','name_b_a' => 'sprel_afdeling_verantwoordelijke_ledenadministratie','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_bestelpersoon_afdeling','name_b_a' => 'sprel_afdeling_bestelpersoon','version' => 3), 0); 
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_bestelpersoon_fractie','name_b_a' => 'sprel_fractie_bestelpersoon','version' => 3), 0); 
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_bestelpersoon_provincie','name_b_a' => 'sprel_provincie_bestelpersoon','version' => 3), 0); 
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_bestelpersoon_landelijk','name_b_a' => 'sprel_landelijk_bestelpersoon','version' => 3), 0); 
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_fractievoorzitter_fractie','name_b_a' => 'sprel_fractie_fractievoorzitter','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_fractievoorzitter_provincie','name_b_a' => 'sprel_provincie_fractievoorzitter','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_fractievoorzitter_landelijk','name_b_a' => 'sprel_landelijk_fractievoorzitter','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_gemeenteraadslid_fractie','name_b_a' => 'sprel_fractie_gemeenteraadslid','version' => 3), 0);   
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_deelraadslid_fractie','name_b_a' => 'sprel_fractie_deelraadslid','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_wethouder_fractie','name_b_a' => 'sprel_fractie_wethouder','version' => 3), 0); 
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_statenlid_provincie','name_b_a' => 'sprel_provincie_statenlid','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_gedeputeerde_provincie','name_b_a' => 'sprel_provincie_gedeputeerde','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_tweede_kamerlid_landelijk','name_b_a' => 'sprel_landelijk_tweede_kamerlid','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_eerste_kamerlid_landelijk','name_b_a' => 'sprel_landelijk_eerste_kamerlid','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_europarlementarier_landelijk','name_b_a' => 'sprel_landelijk_europarlementarier','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_partijbestuurslid_landelijk','name_b_a' => 'sprel_landelijk_partijbestuurslid','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_liddagelijksbestuur_landelijk','name_b_a' => 'sprel_landelijk_liddagelijksbestuur','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_liddagelijksbestuur_landelijk','name_b_a' => 'sprel_landelijk_liddagelijksbestuur','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_personeelslid_amersfoort_landelijk','name_b_a' => 'sprel_landelijk_personeelslid_amersfoort','version' => 3), 0);  
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_personeelslid_denhaag_landelijk','name_b_a' => 'sprel_landelijk_personeelslid_denhaag','version' => 3), 0); 
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_personeelslid_brussel_landelijk','name_b_a' => 'sprel_landelijk_personeelslid_brussel','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_lidberoepscomissie_landelijk','name_b_a' => 'sprel_landelijk_lidberoepscomissie','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_lidfinancielecontrolecomissie_landelijk','name_b_a' => 'sprel_landelijk_lidfinancielecontrolecomissie','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_lidvteam_landelijk','name_b_a' => 'sprel_landelijk_lidvteam','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_bestuurslidrood_landelijk','name_b_a' => 'sprel_landelijk_bestuurslidrood','version' => 3), 0);
  _spgeneric_relationship_type(array('name_a_b' => 'sprel_actiefroodlandelijk_landelijk', 'name_b_a' => 'sprel_landelijk_actiefroodlandelijk','version' => 3), 0);
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

function _spgeneric_contact_type($name, $description, $enabled) {
	$ctExists = civicrm_api('ContactType', 'getsingle', array("name" => $name, 'label' => $name, 'description' => $description, 'parent_id' => 3, 'version' => 3));
	if(!isset($ctExists['id']) && $enabled) {
		$arguments = array("name" => $name, 'label' => $name, 'description' => $description, 'parent_id' => 3, 'version' => 3);
		$result = civicrm_api('ContactType', 'create', $arguments);
	} else {
		$ctExists['is_active'] = $enabled;
		$ctExists['version'] = 3;
		$result = civicrm_api('ContactType', 'create', $ctExists);
	}
}

function _spgeneric_relationship_type($arguments, $enabled) {
	$relExists = civicrm_api('RelationshipType', 'getsingle', $arguments);
	if(!isset($relExists['id']) && $enabled){
		$result = civicrm_api('RelationshipType', 'create', $arguments);
	} else {
		$relExists['is_active'] = $enabled;
		$relExists['version'] = 3;
		$result = civicrm_api('RelationshipType', 'create', $relExists);
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
