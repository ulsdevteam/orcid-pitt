<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * OrcidBatchGroup Model
 *
 */
class OrcidBatchGroup extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 * 
 * @var array
 */
	public $validate = array(
		'name' => 'notEmpty',
	);

/**
 * Before Validate Callback
 *
 * @param array
 * @return boolean
*/
	public function beforeValidate($options) {
		// Add each requireOneCriteria with late binding so as to avoid placing javascript criteria on the form
		$this->validator()->add('group_definition', 'requireOneCriteria', array(
				'rule' => 'requireOneCriteria',
				'message' => 'At least one criteria must be specified.',
			)
		);
		$this->validator()->add('employee_definition', 'requireOneCriteria', array(
				'rule' => 'requireOneCriteria',
				'message' => 'At least one criteria must be specified.',
			)
		);
		$this->validator()->add('student_definition', 'requireOneCriteria', array(
				'rule' => 'requireOneCriteria',
				'message' => 'At least one criteria must be specified.',
			)
		);
		return true;
	}

/**
 * After Validate Callback
 *
*/
		public function afterRules(Event $event, Entity $entity, ArrayObject $options) {
		// Remove each requireOneCriteria so as to avoid placing javascript criteria on the form on validation error
		$this->validator()->remove('group_definition');
		$this->validator()->remove('employee_definition');
		$this->validator()->remove('student_definition');
	}

/**
 * Default order
 *
 * @var mixed
 */
	public $order = 'OrcidBatchGroup.name';

/**
 * Ensure at least on criteria is entered for a group
 *
 * @param array
 * @return boolean
*/
	public function requireOneCriteria($check) {
		foreach (array('group_definition', 'employee_definition', 'student_definition') as $field) {
			if (isset($this->data[$this->name][$field]) && !empty($this->data[$this->name][$field])) {
				return true;
			}
		}
		return false;
	}

/**
 * Has Many
*/
	public $hasMany = array(
		'OrcidBatchGroupCache',
	);

/**
 * Get a subquery expression representing the OrcidUser.id(s) for the group.  If group is -1, return users not associated with a group.
 * 
 * @param int
 * @param string
 * @return Expression
*/
	public function getAssociatedUsers( $groupId, $key ) {
		$this->updateCache($groupId);
		$db = $this->OrcidBatchGroupCache->getDataSource();
		$subQuery = $db->buildStatement(
			array(
				'fields'     => array('cache.orcid_user_id'),
				'table'      => $db->fullTableName($this->OrcidBatchGroupCache),
				'alias'      => 'cache',
				'limit'      => null,
				'offset'     => null,
				'joins'      => array(),
				'conditions' => $groupId == -1 ? null :array('cache.orcid_batch_group_id' => $groupId),
				'order'      => null,
				'group'      => null
			),
			$this->OrcidBatchGroupCache
		);
		$subQuery = ' '.$key.' '.($groupId == -1 ? 'NOT ' : '').'IN (' . $subQuery . ') ';
		return $db->expression($subQuery);
	}

/**
 * Ensure the OrcidBatchGroup.id has an updated cache, creating the OrcidUser(s) if necessary
 *
 * @param int
 * @return boolean
 */
	public function updateCache( $groupId ) {
		// Does this group exist?
		$group = $this->find('first', array('recursive' => -1, 'conditions' => array('OrcidBatchGroup.id' => $groupId)));
		if (!$group) {
			$this->OrcidBatchGroupCache->deleteAll(array('orcid_batch_group_id' => $groupId), false);
			return true;
		}
		// No action needed if the cache was updated in the last 30 minutes
		if ($group['OrcidBatchGroup']['cache_creation_date'] && strtotime($group['OrcidBatchGroup']['cache_creation_date']) + 60 * 30 > time()) {
			return true;
		}
		// Indicate that this cache update is in-progress (blocks simultaneous cache refreshes)
		$group['OrcidBatchGroup']['cache_creation_date'] = date('Y-m-d H:i:s');
		$this->save($group);
		// mark all current cache entries as needing validation or removal
		// quoting the value separately (only when conditions are used) is some sort of ridiculous backwards compatibility thing with DboSource's update() implementation
		$db = $this->getDataSource();
		$deprecated = $db->value(date('Y-m-d H:i:s'), 'date');
		$this->OrcidBatchGroupCache->updateAll(array('deprecated' => $deprecated), array('orcid_batch_group_id' => $groupId));
		if ($group['OrcidBatchGroup']['group_definition']) {
			$this->Person = ClassRegistry::init('Person');
		}

		$groupMembers = array();
		if ($group['OrcidBatchGroup']['student_definition'] || $group['OrcidBatchGroup']['employee_definition']) {
			// CDS defintion(s) is (are) the base query
			if ($group['OrcidBatchGroup']['student_definition']) {
				$this->OrcidStudent = ClassRegistry::init('OrcidStudent');
				$options = array('recursive' => -1, 'conditions' => $group['OrcidBatchGroup']['student_definition']);
				$students = $this->OrcidStudent->find('all', $options);
				if (!$students) {
					$students = array();
				}
				foreach ($students as $student) {
					// skip if a group defintion is provided and the user does not match the definition
					if ($group['OrcidBatchGroup']['group_definition']) {
						// TODO: warning: hardcoded foreign key relationship
						$options = array('conditions' => '(&(cn='.$student['OrcidStudent']['username'].')'.$group['OrcidBatchGroup']['group_definition'].')');
						if (!$this->Person->find('first', $options)) {
							continue;
						}
					}
					$groupMembers[$student['OrcidStudent']['username']] = $student['OrcidStudent']['username'];
				}
			}
			if ($group['OrcidBatchGroup']['employee_definition']) {
				$this->OrcidEmployee = ClassRegistry::init('OrcidEmployee');
				$options = array('recursive' => -1, 'conditions' => $group['OrcidBatchGroup']['employee_definition']);
				$employees = $this->OrcidEmployee->find('all', $options);
				if (!$employees) {
					$employees = array();
				}
				foreach ($employees as $employee) {
					// skip if a group defintion is provided and the user does not match the definition
					if ($group['OrcidBatchGroup']['group_definition']) {
						// TODO: warning: hardcoded foreign key relationship
						$options = array('conditions' => '(&(cn='.$employee['OrcidEmployee']['username'].')'.$group['OrcidBatchGroup']['group_definition'].')');
						if (!$this->Person->find('first', $options)) {
							continue;
						}
					}
					$groupMembers[$employee['OrcidEmployee']['username']] = $employee['OrcidEmployee']['username'];
				}
			}
		} else if ($group['OrcidBatchGroup']['group_definition']) {
			// group_defintion is the base query
			// TODO: risky because Person is LDAP and may not support paging
			$options = array('recurisve' => -1, 'conditions' => $group['OrcidBatchGroup']['group_definition']);
			$people = $this->Person->find('all', $options);
			if (!$people) {
				$people = array();
			}
			$this->OrcidUser = ClassRegistry::init('OrcidUser');
			foreach ($people as $person) {
				$groupMembers[$person['Person']['cn']] = $person['Person']['cn'];
			}
		}

		$this->OrcidUser = ClassRegistry::init('OrcidUser');
		// Refresh the cache
		foreach ($groupMembers as $groupMember) {
			$options = array('recursive' => -1, 'conditions' => array('OrcidUser.username' => $groupMember));
			$user = $this->OrcidUser->find('first', $options);
			if (!$user) {
				$this->OrcidUser->create();
				$user['OrcidUser'] = array('username' => $groupMember);
				if (!$this->OrcidUser->save($user)) {
					continue;
				} else {
					$user = $this->OrcidUser->find('first', $options);
				}
			}
			// create or update the user in the cache
			if ($user['OrcidUser']['id']) {
				$options = array('conditions' => array('orcid_user_id' => $user['OrcidUser']['id'], 'orcid_batch_group_id' => $groupId));
				$cache = $this->OrcidBatchGroupCache->find('first', $options);
				if (!$cache) {
					$this->OrcidBatchGroupCache->create();
					$cache['OrcidBatchGroupCache']['orcid_user_id'] = $user['OrcidUser']['id'];
					$cache['OrcidBatchGroupCache']['orcid_batch_group_id'] = $groupId;
				} else {
					$cache['OrcidBatchGroupCache']['deprecated'] = NULL;
				}
				$this->OrcidBatchGroupCache->save($cache);
			}
		}
		// If the cache entry wasn't updated, delete it
		$this->OrcidBatchGroupCache->deleteAll(array('orcid_batch_group_id' => $groupId, 'NOT' => array('deprecated' => NULL)));
		// Indicate that this cache update is complete
		$group['OrcidBatchGroup']['cache_creation_date'] = date('Y-m-d H:i:s');
		$this->save($group);

		return true;
	}

}
