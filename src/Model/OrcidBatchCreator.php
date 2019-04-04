<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidBatchCreator Model
 *
 * @property OrcidBatch $OrcidBatch
 */
class OrcidBatchCreator extends AppModel {

	const FLAG_DISABLED = 1;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Creator name must be provided.',
			),
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'OrcidBatch' => array(
			'className' => 'OrcidBatch',
			'foreignKey' => 'orcid_batch_creator_id',
			'dependent' => false,
		)
	);

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Person' => array(
			'className' => 'Person',
			'foreignKey' => 'cn',
			'alternateKey' => 'name',
			'fields' => array('samaccountname', 'dn', 'givenName', 'sn', 'mail', 'displayName'),
		),
	);
}
