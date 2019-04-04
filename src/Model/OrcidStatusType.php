<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidStatusType Model
 *
 */
class OrcidStatusType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Virtual fields
 * 
 * @var array
*/
	public $virtualFields = array(
		'seq_name' => 'OrcidStatusType.seq || OrcidStatusType.name',
	);

/**
 * Ordering
 * 
 * @var array
*/
	public $order = array(
		'OrcidStatusType.seq' => 'ASC',
	);


/**
 * Validation rules
 * 
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'A name for this status type is required.',
			),
		),
		'seq' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber', true),
				'message' => 'Sequence must be a natural number.',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Sequence position already in use.',
			),
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		/*
		 * removed because view of orcid_statuses was trying to query everyone
		'AllOrcidStatus' => array(
			'className' => 'AllOrcidStatus',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		 */
		'CurrentOrcidStatus' => array(
			'className' => 'CurrentOrcidStatus',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
