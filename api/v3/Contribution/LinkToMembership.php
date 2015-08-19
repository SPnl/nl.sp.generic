<?php

function civicrm_api3_contribution_LinkToMembership($params) {
  if (empty($params['source'])) {
    return civicrm_api3_create_error('source is required');
  }
  if (empty($params['membership_type_ids'])) {
    return civicrm_api3_create_error('membership_type_ids is required and it should contain a comma seperated list of memberships type ids');
  }
  if (is_array($params['membership_type_ids'])) {
    $membership_type_ids = $params['membership_type_ids'];
  } else {
    $membership_type_ids = explode(",", $params['membership_type_ids']);
  }

  $limit = 200;
  if (!empty($params['limit'])) {
    $limit = $params['limit'];
  }
  $return = CRM_Spgeneric_Contribution_LinkToMembership::LinkToMembership($params['source'], $membership_type_ids, $limit);

  return civicrm_api3_create_success($return,$params);
}