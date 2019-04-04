<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrcidStatusTypes Model
 *
 * @method \App\Model\Entity\OrcidStatusType get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrcidStatusType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrcidStatusType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrcidStatusType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidStatusType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidStatusType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidStatusType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidStatusType findOrCreate($search, callable $callback = null, $options = [])
 */
class OrcidStatusTypesTable extends Table
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

        $this->setTable('ULS.orcid_status_types');
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
            ->integer('SEQ')
            ->allowEmptyString('SEQ')
            ->add('SEQ', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['SEQ']));
        $rules->add($rules->isUnique(['ID']));

        return $rules;
    }
}
