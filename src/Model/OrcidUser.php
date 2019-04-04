<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidUser Model
 *
 */
class OrcidUser extends AppModel {

	public $displayField = 'username';

/**
 * Validation rules
 * 
 * @var array
 */
	public $validate = array(
		'username' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'Username must be alphnumeric.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 8),
				'message' => 'Username must be 8 characters or less.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Username is required.',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Username is already in use.',
			),
		),
		'orcid' => array(
			'format' => array(
				'rule' => '/^(\d{4}-\d{4}-\d{4}-\d{3}[0-9X])$/',
				'message' => 'ORCID must be a valid ORCID format.',
				'allowEmpty' => true,
			),
			'checksum' => array(
				'rule' => 'orcid_checksum',
				'message' => 'ORCID must yield a valid ORCID checksum.',
				'allowEmpty' => true,
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'ORCID is already in use.',
			),
		),
		'token' => array(
			'format' => array(
				'rule' => array('uuid'),
				'message' => 'Scope Token must be a valid UUID',
				'allowEmpty' => true,
			),
		),
	);

/**
 * Ensure finds operate on lowercase usernames for case insensitivity
 * 
 * @param array $query
 * @return array
 */
	public function beforeFind($query) {
		if (is_array($query['conditions']) && isset($query['conditions']['OrcidUser.username'])) {
			if (is_array($query['conditions']['OrcidUser.username'])) {
				$query['conditions']['OrcidUser.username'] = array_map('strtoupper', $query['conditions']['OrcidUser.username']);
			} else {
				$query['conditions']['OrcidUser.username'] = strtoupper($query['conditions']['OrcidUser.username']);
			}
		}
		return $query;
	}

/**
 * Ensure saves force lowercase usernames for case insensitivity
 * 
 * @param array $query
 * @return bool
 */
	public function beforeSave($query) {
		if (isset($this->data['OrcidUser']['username'])) {
			$this->data['OrcidUser']['username'] = strtoupper($this->data['OrcidUser']['username']);
		}
		return true;
	}
	

/**
 * Custom validation: ORCID checksum
 * @param array $check
 * @return bool
 */
	public function orcid_checksum($check) {
		$values = array_values($check);
		$orcid= str_replace('-', '', $values[0]);
		if (strlen($orcid) != 16) {
			return false;
		}
		$total = 0;
		for ($i=0; $i<15; $i++) {
			$total = ($total + $orcid[$i]) *2;
		}
		
		$remainder = $total % 11;
		$result = (12 - $remainder) % 11;

		return ($orcid[15] == ($result==10 ? 'X' : $result));
	}

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AllOrcidStatus' => array(
			'className' => 'AllOrcidStatus',
		),
		'OrcidEmail' => array(
			'className' => 'OrcidEmail',
			'dependent'=>true,
		),
		'OrcidStatus' => array(
			'className' => 'OrcidStatus',
			'dependent'=>true,
		),
	);
	
	public $hasOne = array(
		'Person' => array(
			'className' => 'Person',
			'foreignKey' => 'cn',
			'alternateKey' => 'username',
			'fields' => array('samaccountname', 'dn', 'givenName', 'sn', 'mail', 'displayName', 'department', 'PittEmployeeRC'),
		),
		'CurrentOrcidStatus' => array(
			'className' => 'CurrentOrcidStatus',
		),
	);


}
