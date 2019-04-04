<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidBatch Model
 *
 * @property OrcidBatchCreator $OrcidBatchCreator
 * @property OrcidBatchTrigger $OrcidBatchTrigger
 */
class OrcidBatch extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'A name for this batch must be provided.'
			),
		),
		'subject' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The email subject must be provided.'
			),
		),
		'body' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The email body must be provided.'
			),
		),
		'from_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The from display name must be provided.',
			),
		),
		'from_addr' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'The from address must be a valid email.',
			),
		),
		'reply_to' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'The from address must be a valid email.',
				'allowEmpty' => true,
			),
		),
		'orcid_batch_creator_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The batch creator must be provided.',
			),
		),
	);
/**
 * default order
 *
 * @var mixed
 */
	public $order = 'OrcidBatch.name';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OrcidBatchCreator' => array(
			'className' => 'OrcidBatchCreator',
			'foreignKey' => 'orcid_batch_creator_id',
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'OrcidBatchTrigger' => array(
			'className' => 'OrcidBatchTrigger',
			'foreignKey' => 'orcid_batch_id',
			'dependent' => true,
		)
	);

}
