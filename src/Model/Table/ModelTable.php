<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Model Model
 *
 * @property \App\Model\Table\BrandTable&\Cake\ORM\Association\BelongsTo $Brand
 * @property \App\Model\Table\MachineTable&\Cake\ORM\Association\HasMany $Machine
 *
 * @method \App\Model\Entity\Model newEmptyEntity()
 * @method \App\Model\Entity\Model newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Model[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Model get($primaryKey, $options = [])
 * @method \App\Model\Entity\Model findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Model patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Model[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Model|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Model saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ModelTable extends Table
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

        $this->setTable('model');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Brand', [
            'foreignKey' => 'brand_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Machine', [
            'foreignKey' => 'model_id',
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
            ->scalar('name')
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn('brand_id', 'Brand'), ['errorField' => 'brand_id']);

        return $rules;
    }
}
