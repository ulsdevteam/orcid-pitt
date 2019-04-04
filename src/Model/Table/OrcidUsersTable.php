<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrcidUsers Model
 *
 * @method \App\Model\Entity\OrcidUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrcidUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrcidUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrcidUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidUser findOrCreate($search, callable $callback = null, $options = [])
 */
class OrcidUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('ULS.orcid_users');
        $this->setPrimaryKey('ID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('ID')
            ->requirePresence('ID', 'create')
            ->allowEmptyString('ID', false)
            ->add('ID', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('USERNAME')
            ->maxLength('USERNAME', 8)
            ->requirePresence('USERNAME', 'create')
            ->allowEmptyString('USERNAME', false)
            ->add('USERNAME', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('ORCID')
            ->maxLength('ORCID', 19)
            ->allowEmptyString('ORCID');

        $validator
            ->scalar('TOKEN')
            ->maxLength('TOKEN', 255)
            ->allowEmptyString('TOKEN');

        $validator
            ->dateTime('CREATED')
            ->allowEmptyDateTime('CREATED');

        $validator
            ->dateTime('MODIFIED')
            ->allowEmptyDateTime('MODIFIED');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['USERNAME']));
        $rules->add($rules->isUnique(['ID']));

        return $rules;
    }
}
