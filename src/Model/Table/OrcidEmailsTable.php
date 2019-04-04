<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrcidEmails Model
 *
 * @method \App\Model\Entity\OrcidEmail get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrcidEmail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrcidEmail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrcidEmail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidEmail|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrcidEmail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidEmail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrcidEmail findOrCreate($search, callable $callback = null, $options = [])
 */
class OrcidEmailsTable extends Table
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

        $this->setTable('ULS.orcid_emails');
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
            ->integer('ORCID_USER_ID')
            ->requirePresence('ORCID_USER_ID', 'create')
            ->allowEmptyString('ORCID_USER_ID', false);

        $validator
            ->integer('ORCID_BATCH_ID')
            ->requirePresence('ORCID_BATCH_ID', 'create')
            ->allowEmptyString('ORCID_BATCH_ID', false);

        $validator
            ->dateTime('QUEUED')
            ->allowEmptyDateTime('QUEUED');

        $validator
            ->dateTime('SENT')
            ->allowEmptyDateTime('SENT');

        $validator
            ->dateTime('CANCELLED')
            ->allowEmptyDateTime('CANCELLED');

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
