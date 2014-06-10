<?php

/**
 * Onderstaande klasse zorgt ervoor dat er op
 * het formulier nieuw lidmaatschap een overzicht
 * getoond wordt van de gezinsleden die bij het contact horen
 */
class CRM_Spgeneric_Buildform_ToonGezinsleden {

  protected $form;

  public function __construct(&$form) {
    $this->form = $form;
  }

  /**
   * Add the UI code to the form
   */
  public function parse() {
    if (!empty($this->form->getVar('_contactID'))) {
      $contactId = $this->form->getVar('_contactID');
      //the contact id is already set on this form so set the information static
      $this->parseStatic($contactId);
    } else {
      $this->parseDynamic();
    }
  }
  
  public static function getHtmlSnippet($contactId) {
    $relationships = self::getRelationships($contactId);
    if (count($relationships) > 0) {
      $template = CRM_Core_Smarty::singleton();
      $template->assign('relationships', $relationships);
      return $template->fetch('CRM/Spgeneric/PageBody/Buildform/Toongezinsleden.tpl');
    }
      
    return "";
  }
  
  /**
   * Parse a dynamic membership form. E.f. the contact will be entered by the
   * user so we don't know which contact we have to check for
   * 
   */
  protected function parseDynamic() {
    $snippet['template'] = 'CRM/Spgeneric/PageBody/Buildform/ToongezinsledenDynamic.tpl';
    CRM_Core_Region::instance('page-body')->add($snippet);
  }

  /**
   * Parse a static membership form. E.g. when contact is already present
   * 
   */
  protected function parseStatic($contactId) {
      $relationships = self::getHtmlSnippet($contactId);

      if (!empty($relationships)) {
        $snippet['template'] = 'CRM/Spgeneric/PageBody/Buildform/ToongezinsledenStatic.tpl';
        $snippet['relationships'] = $relationships;
        CRM_Core_Region::instance('page-body')->add($snippet);
      }
  }
  
  protected static function getRelationships($contactId) {
    //retrieve gezinsleden
    $relationships = array();
    $rel_type_id = civicrm_api3('RelationshipType', 'getvalue', array('return' => 'id', 'name_a_b' => 'sprel_gezinslid_a', 'name_b_a' => 'sprel_gezinslid_b'));
    if ($rel_type_id) {
      $sql = "SELECT 
            `contact_a`.`id` AS contact_a_id,
            `contact_a`.`display_name` AS `contact_a_display_name`,
            `contact_a`.`sort_name` AS `contact_a_sort_name`,
            `contact_b`.`id` AS `contact_b_id`,
            `contact_b`.`display_name` AS `contact_b_display_name` ,
            `contact_b`.`sort_name` AS `contact_b_sort_name`,
            `civicrm_relationship_type`.`label_a_b` AS `label_a_b`,
            `civicrm_relationship_type`.`label_b_a` AS `label_b_a`
            FROM `civicrm_relationship` `r` 
            INNER JOIN `civicrm_contact` `contact_a` ON `contact_a`.`id` = `r`.`contact_id_a`
            INNER JOIN `civicrm_contact` `contact_b` ON `contact_b`.`id` = `r`.`contact_id_b`
            INNER JOIN `civicrm_relationship_type` ON `civicrm_relationship_type`.`id` = `r`.`relationship_type_id`
            WHERE `r`.`relationship_type_id` = '" . $rel_type_id . "'
            AND (`r`.`contact_id_a` = '" . $contactId . "' OR `r`.`contact_id_b` = '" . $contactId . "')
            AND (`r`.`start_date` IS NULL OR `r`.`start_date` <= NOW()) 
            AND (`r`.`end_date` IS NULL OR `r`.`end_date` >= NOW()) 
            AND (`r`.`start_date` IS NOT NULL OR `r`.`end_date` IS NOT NULL OR `r`.`is_active` = '1')";
      $dao = CRM_Core_DAO::executeQuery($sql);
      while ($dao->fetch()) {
        if ($dao->contact_a_id == $contactId) {
          $relationship['contact_id'] = $dao->contact_b_id;
          $relationship['contact_name'] = $dao->contact_b_display_name;
          $relationship['contact_sort'] = $dao->contact_b_sort_name;
          $relationship['label'] = $dao->label_a_b;
        } else {
          $relationship['contact_id'] = $dao->contact_a_id;
          $relationship['contact_name'] = $dao->contact_a_display_name;
          $relationship['contact_sort'] = $dao->contact_a_sort_name;
          $relationship['label'] = $dao->label_b_a;
        }

        $relationship['url'] = CRM_Utils_System::url("civicrm/contact/view", 'reset=1&cid=' . $relationship['contact_id']);

        $relationships[$relationship['contact_sort']] = $relationship;
      }

      ksort($relationships);
    }
    
    return $relationships;
  }

}
