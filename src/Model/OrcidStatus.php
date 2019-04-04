<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidStatus Model
 *
 * @property OrcidUser $OrcidUser
 * @property OrcidStatusType $OrcidStatusType
 */
class OrcidStatus extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'orcid_user_id' => array(
			'rule' => array('notEmpty'),
			'message' => 'User must be provided.',
		),
		'orcid_status_type_id' => array(
			'rule' => array('notEmpty'),
			'message' => 'Status type must be provided.',
		),
		'status_timestamp' => array(
			'rule' => array('datetime'),
			'message' => 'Status timestamp must be a valid datetime.'
		),
	);
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OrcidStatusType' => array(
			'className' => 'OrcidStatusType',
			'foreignKey' => 'orcid_status_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
