<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrcidBatchTriggers Model
 *
 * @method \App\Model\Entity\OrcidBatchTrigger get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrcidBatchTrigger newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrcidBatchTrigger[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatchTrigger|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidBatchTrigger|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidBatchTrigger patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatchTrigger[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatchTrigger findOrCreate($search, callable $callback = null, $options = [])
 */
class OrcidBatchTriggersTable extends Table
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

        $this->setTable('ULS.orcid_batch_triggers');
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
            ->scalar('NAME')
            ->maxLength('NAME', 512)
            ->requirePresence('NAME', 'create')
            ->allowEmptyString('NAME', false);

        $validator
            ->integer('ORCID_STATUS_TYPE_ID')
            ->requirePresence('ORCID_STATUS_TYPE_ID', 'create')
            ->allowEmptyString('ORCID_STATUS_TYPE_ID', false);

        $validator
            ->integer('ORCID_BATCH_ID')
            ->requirePresence('ORCID_BATCH_ID', 'create')
            ->allowEmptyString('ORCID_BATCH_ID', false);

        $validator
            ->integer('TRIGGER_DELAY')
            ->requirePresence('TRIGGER_DELAY', 'create')
            ->allowEmptyString('TRIGGER_DELAY', false);

        $validator
            ->integer('ORCID_BATCH_GROUP_ID')
            ->allowEmptyString('ORCID_BATCH_GROUP_ID');

        $validator
            ->dateTime('BEGIN_DATE')
            ->allowEmptyDateTime('BEGIN_DATE');

        $validator
            ->integer('REQUIRE_BATCH_ID')
            ->allowEmptyString('REQUIRE_BATCH_ID');

        $validator
            ->integer('REPEAT')
            ->requirePresence('REPEAT', 'create')
            ->allowEmptyString('REPEAT', false);

        $validator
            ->integer('MAXIMUM_REPEAT')
            ->requirePresence('MAXIMUM_REPEAT', 'create')
            ->allowEmptyString('MAXIMUM_REPEAT', false);

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
        $rules->add($rules->isUnique(['ID']));

        return $rules;
    }
}
