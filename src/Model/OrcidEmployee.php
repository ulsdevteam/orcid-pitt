<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidEmployee Model
 *
 */
class OrcidEmployee extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'cds';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'orcid_employee';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'username';

/**
 * Ensure finds operate on uppercase usernames for case insensitivity
 * 
 * @param array $query
 * @return array
 */
	public function beforeFind($query) {
		if (is_array($query['conditions']) && isset($query['conditions']['OrcidEmployee.username'])) {
			if (is_array($query['conditions']['OrcidEmployee.username'])) {
				$query['conditions']['OrcidEmployee.username'] = array_map('strtoupper', $query['conditions']['OrcidEmployee.username']);
			} else {
				$query['conditions']['OrcidEmployee.username'] = strtoupper($query['conditions']['OrcidEmployee.username']);
			}
		} else if (is_string($query['conditions'])) {
			$query['conditions'] = array('NOT' => array('OrcidEmployee.username' => NULL), $query['conditions']);
		} else {
			$query['conditions']['OrcidEmployee.username'] = array('NOT' => NULL);
		}
		return $query;
	}

}
