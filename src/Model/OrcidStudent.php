<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidStudent Model
 *
 */
class OrcidStudent extends AppModel {

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
	public $useTable = 'orcid_student';

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
		if (is_array($query['conditions']) && isset($query['conditions']['OrcidStudent.username'])) {
			if (is_array($query['conditions']['OrcidStudent.username'])) {
				$query['conditions']['OrcidStudent.username'] = array_map('strtoupper', $query['conditions']['OrcidStudent.username']);
			} else {
				$query['conditions']['OrcidStudent.username'] = strtoupper($query['conditions']['OrcidStudent.username']);
			}
		} else if (is_string($query['conditions'])) {
			$query['conditions'] = array('NOT' => array('OrcidStudent.username' => NULL), $query['conditions']);
		} else {
			$query['conditions']['OrcidStudent.username'] = array('NOT' => NULL);
		}
		return $query;
	}

}
