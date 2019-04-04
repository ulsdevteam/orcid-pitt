<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrcidBatches Model
 *
 * @method \App\Model\Entity\OrcidBatch get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrcidBatch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrcidBatch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatch|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidBatch|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidBatch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatch findOrCreate($search, callable $callback = null, $options = [])
 */
class OrcidBatchesTable extends Table
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

        $this->setTable('ULS.orcid_batches');
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
            ->scalar('SUBJECT')
            ->maxLength('SUBJECT', 512)
            ->requirePresence('SUBJECT', 'create')
            ->allowEmptyString('SUBJECT', false);

        $validator
            ->scalar('BODY')
            ->maxLength('BODY', 4000)
            ->requirePresence('BODY', 'create')
            ->allowEmptyString('BODY', false);

        $validator
            ->scalar('FROM_NAME')
            ->maxLength('FROM_NAME', 64)
            ->requirePresence('FROM_NAME', 'create')
            ->allowEmptyString('FROM_NAME', false);

        $validator
            ->scalar('FROM_ADDR')
            ->maxLength('FROM_ADDR', 64)
            ->requirePresence('FROM_ADDR', 'create')
            ->allowEmptyString('FROM_ADDR', false);

        $validator
            ->scalar('REPLY_TO')
            ->maxLength('REPLY_TO', 64)
            ->allowEmptyString('REPLY_TO');

        $validator
            ->integer('ORCID_BATCH_CREATOR_ID')
            ->requirePresence('ORCID_BATCH_CREATOR_ID', 'create')
            ->allowEmptyString('ORCID_BATCH_CREATOR_ID', false);

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
