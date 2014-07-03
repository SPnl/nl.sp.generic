<?php

/* 
 * AJAX page for returning the HTML snippet for gezinsleden
 * Used on the membership form page
 */

class CRM_Spgeneric_Page_AJAX_ToonGezinsleden {
  
  static function autocomplete() {
    $contactId = CRM_Utils_Request::retrieve('contact_id', 'Integer');
    if ($contactId) {
      echo CRM_Spgeneric_Buildform_ToonGezinsleden::getHtmlSnippet($contactId);
    }
    echo "";
    
    CRM_Utils_System::civiExit();
  }
  
}
