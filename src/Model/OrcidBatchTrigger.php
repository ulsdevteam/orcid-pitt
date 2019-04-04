<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidBatchTrigger Model
 *
 * @property OrcidStatusType $OrcidStatusType
 * @property OrcidBatch $OrcidBatch
 */
class OrcidBatchTrigger extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The trigger name must be provided',
			),
		),
		'orcid_status_type_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The status type must be provided.',
			),
		),
		'orcid_batch_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The batch must be provided.',
			),
		),
		'trigger_delay' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber', true),
				'message' => 'The triggering days must be a natural number',
			),
		),
		'repeat' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber', true),
				'message' => 'The repetition days must be a natural number',
			),
		),
		'maximum_repeat' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber', true),
				'message' => 'The repetition limit must be a natural number',
			),
		),
	);

/**
 * Default sort order
 *
 * @var mixed
 */
	public $order = 'OrcidBatchTrigger.name';
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OrcidStatusType' => array(
			'className' => 'OrcidStatusType',
			'foreignKey' => 'orcid_status_type_id',
		),
		'OrcidBatch' => array(
			'className' => 'OrcidBatch',
			'foreignKey' => 'orcid_batch_id',
		),
		'OrcidBatchGroup' => array(
			'className' => 'OrcidBatchGroup',
			'foreignKey' => 'orcid_batch_group_id',
		),
	);
}
