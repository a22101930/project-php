<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SoftVersion Model
 *
 * @property \App\Model\Table\SoftwareTable&\Cake\ORM\Association\BelongsTo $Software
 * @property \App\Model\Table\GestaoSoftTable&\Cake\ORM\Association\HasMany $GestaoSoft
 *
 * @method \App\Model\Entity\SoftVersion newEmptyEntity()
 * @method \App\Model\Entity\SoftVersion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SoftVersion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SoftVersion get($primaryKey, $options = [])
 * @method \App\Model\Entity\SoftVersion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SoftVersion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SoftVersion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SoftVersion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SoftVersion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SoftVersion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SoftVersion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SoftVersion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SoftVersion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SoftVersionTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('soft_version');
        $this->setDisplayField('version');
        $this->setPrimaryKey('id');

        $this->belongsTo('Software', [
            'foreignKey' => 'software_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('GestaoSoft', [
            'foreignKey' => 'soft_version_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('version')
            ->maxLength('version', 20)
            ->requirePresence('version', 'create')
            ->notEmptyString('version');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('software_id', 'Software'), ['errorField' => 'software_id']);

        return $rules;
    }
}
