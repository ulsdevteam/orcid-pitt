<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrcidBatchCreators Model
 *
 * @method \App\Model\Entity\OrcidBatchCreator get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrcidBatchCreator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrcidBatchCreator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatchCreator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidBatchCreator|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidBatchCreator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatchCreator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidBatchCreator findOrCreate($search, callable $callback = null, $options = [])
 */
class OrcidBatchCreatorsTable extends Table
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

        $this->setTable('ULS.orcid_batch_creators');
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
            ->maxLength('NAME', 8)
            ->requirePresence('NAME', 'create')
            ->allowEmptyString('NAME', false)
            ->add('NAME', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('FLAGS')
            ->requirePresence('FLAGS', 'create')
            ->allowEmptyString('FLAGS', false);

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
        $rules->add($rules->isUnique(['NAME']));

        return $rules;
    }
}
