<?php

/**
 * Collection of upgrade steps
 */
class CRM_Spgeneric_Upgrader extends CRM_Spgeneric_Upgrader_Base {

  public function upgrade_1001() {
    $this->executeCustomDataFile('xml/communicatie.xml');
    return true;
  }

  public function upgrade_1002() {
    // Find all contacts with retour post = Ja and set Geen_post to yes and Geen_post_reden = Retourpost (1)
    CRM_core_DAO::executeQuery("
      INSERT INTO `civicrm_value_communicatie` (entity_id, geen_post, reden_geen_post)
      SELECT entity_id as entity_id, 1 as geen_post, 1 as reden_geen_post FROM civicrm_value_migratie_1 WHERE retourpost_3 = '1'
    ");
    // Find all deceased contacts and set Geen_post to yes and Geen_post_reden = Overleden (2)
    // We need to find this one by one as otherwise we get an error on trigger/stored procedure
    $dao = CRM_Core_DAO::executeQuery("SELECT id FROM civicrm_contact WHERE is_deceased = '1' AND id NOT IN (select entity_id FROM civicrm_value_communicatie)");
    while ($dao->fetch()) {
      $params = array(
        1 => array($dao->id, 'Integer')
      );
      CRM_core_DAO::executeQuery("INSERT INTO `civicrm_value_communicatie` (entity_id, geen_post, reden_geen_post) VALUES (%1, 1, 2)", $params);
    }

    return true ;
  }

  public function install() {
    $this->executeCustomDataFile('xml/communicatie.xml');
  }


}
