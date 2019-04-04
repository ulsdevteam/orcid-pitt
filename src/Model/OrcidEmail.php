<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidEmail Model
 *
 * @property OrcidUser $OrcidUser
 */
class OrcidEmail extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'orcid_user_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The target user must be provided.',
			),
		),
	);

/**
 * Default order
 *
 * @var mixed
 */
	public $order = 'OrcidEmail.queued DESC';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OrcidUser' => array(
			'className' => 'OrcidUser',
			'foreignKey' => 'orcid_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OrcidBatch' => array(
			'className' => 'OrcidBatch',
			'foreignKey' => 'orcid_batch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
